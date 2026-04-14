<x-layout title="Acquisitions">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Acquisitions Management</h1>

        @if (session('success'))
            <div class="bg-green-600 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('acquisitions.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg mb-6 inline-block">Add New Acquisition</a>

        <!-- Search Form -->
        <div class="mb-6 bg-slate-800 p-4 rounded-lg">
            <form method="GET">
                <div class="flex space-x-4">
                    <input type="text" name="search" class="flex-1 px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" placeholder="Search by book title/author or supplier" value="{{ request('search') }}">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                    <a href="{{ route('acquisitions.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Clear</a>
                </div>
            </form>
        </div>

        <div class="glass-card rounded-lg overflow-hidden">
            <table class="w-full text-white">
                <thead class="bg-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Book</th>
                        <th class="px-4 py-3 text-left">Supplier</th>
                        <th class="px-4 py-3 text-left">Acquisition Date</th>
                        <th class="px-4 py-3 text-left">Cost</th>
                        <th class="px-4 py-3 text-left">Quantity Added</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($acquisitions as $acquisition)
                        <tr class="border-t border-slate-600">
                            <td class="px-4 py-3">{{ $acquisition->book->title }}</td>
                            <td class="px-4 py-3">{{ $acquisition->supplier }}</td>
                            <td class="px-4 py-3">{{ $acquisition->acquisition_date->format('Y-m-d') }}</td>
                            <td class="px-4 py-3">${{ number_format($acquisition->cost, 2) }}</td>
                            <td class="px-4 py-3">{{ $acquisition->quantity_added }}</td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('acquisitions.show', $acquisition) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">View</a>
                                <a href="{{ route('acquisitions.edit', $acquisition) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('acquisitions.destroy', $acquisition) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-slate-400">No acquisitions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $acquisitions->appends(request()->query())->links() }}
        </div>
    </div>
</x-layout>
