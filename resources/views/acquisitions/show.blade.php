<x-layout title="Acquisition Details">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Acquisition Details</h1>

        <div class="glass-card rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-white font-medium mb-2">Book</label>
                    <p class="text-slate-300">{{ $acquisition->book->title }} by {{ $acquisition->book->author }}</p>
                </div>

                <div>
                    <label class="block text-white font-medium mb-2">Supplier</label>
                    <p class="text-slate-300">{{ $acquisition->supplier }}</p>
                </div>

                <div>
                    <label class="block text-white font-medium mb-2">Acquisition Date</label>
                    <p class="text-slate-300">{{ $acquisition->acquisition_date->format('Y-m-d') }}</p>
                </div>

                <div>
                    <label class="block text-white font-medium mb-2">Cost</label>
                    <p class="text-slate-300">${{ number_format($acquisition->cost, 2) }}</p>
                </div>

                <div>
                    <label class="block text-white font-medium mb-2">Quantity Added</label>
                    <p class="text-slate-300">{{ $acquisition->quantity_added }}</p>
                </div>

                @if($acquisition->notes)
                <div class="md:col-span-2">
                    <label class="block text-white font-medium mb-2">Notes</label>
                    <p class="text-slate-300">{{ $acquisition->notes }}</p>
                </div>
                @endif
            </div>

            <div class="mt-8 flex space-x-4">
                <a href="{{ route('acquisitions.edit', $acquisition) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <a href="{{ route('acquisitions.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>
        </div>
    </div>
</x-layout>
