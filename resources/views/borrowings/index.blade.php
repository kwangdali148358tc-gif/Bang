<x-layout title="Borrowings">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Borrowings Management</h1>

        @if (session('success'))
            <div class="bg-green-600 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('borrowings.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg mb-6 inline-block">Add New Borrowing</a>

        <!-- Search and Filter Form -->
        <div class="mb-6 bg-slate-800 p-4 rounded-lg">
            <form method="GET">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <input type="text" name="search" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" placeholder="Search by user or book title/author" value="{{ request('search') }}">
                    </div>
                    <div>
                        <select name="status" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="returned" {{ request('status') == 'returned' ? 'selected' : '' }}>Returned</option>
                            <option value="overdue" {{ request('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
                        </select>
                    </div>
                    <div class="flex items-end space-x-2">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                        <a href="{{ route('borrowings.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Clear</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="glass-card rounded-lg overflow-hidden">
            <table class="w-full text-white">
                <thead class="bg-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Borrower</th>
                        <th class="px-4 py-3 text-left">Book</th>
                        <th class="px-4 py-3 text-left">Borrow Date</th>
                        <th class="px-4 py-3 text-left">Due Date</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowings as $borrowing)
                        <tr class="border-t border-slate-600">
                            <td class="px-4 py-3">{{ $borrowing->user->first_name }} {{ $borrowing->user->last_name }}</td>
                            <td class="px-4 py-3">{{ $borrowing->book->title }}</td>
                            <td class="px-4 py-3">{{ $borrowing->borrow_date->format('Y-m-d') }}</td>
                            <td class="px-4 py-3">{{ $borrowing->due_date->format('Y-m-d') }}</td>
                            <td class="px-4 py-3">
                                @switch($borrowing->status)
                                    @case('pending')
                                        <span class="bg-blue-600 text-white px-2 py-1 rounded text-sm">Pending</span>
                                        @break
                                    @case('returned')
                                        <span class="bg-green-600 text-white px-2 py-1 rounded text-sm">Returned</span>
                                        @break
                                    @case('overdue')
                                        <span class="bg-red-600 text-white px-2 py-1 rounded text-sm">Overdue</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('borrowings.show', $borrowing) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">View</a>
                                <a href="{{ route('borrowings.edit', $borrowing) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-slate-400">No borrowings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $borrowings->appends(request()->query())->links() }}
        </div>
    </div>
</x-layout>
