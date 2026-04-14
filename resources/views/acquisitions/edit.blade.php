<x-layout title="Edit Acquisition">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Edit Acquisition</h1>

        <div class="glass-card rounded-lg p-6">
            <form action="{{ route('acquisitions.update', $acquisition) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="book_id" class="block text-white font-medium mb-2">Book</label>
                        <select class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="book_id" name="book_id" required>
                            <option value="">Select Book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id', $acquisition->book_id) == $book->id ? 'selected' : '' }}>{{ $book->title }} by {{ $book->author }}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="acquisition_date" class="block text-white font-medium mb-2">Acquisition Date</label>
                        <input type="date" value="{{ old('acquisition_date', $acquisition->acquisition_date->format('Y-m-d')) }}" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="acquisition_date" name="acquisition_date" required>
                        @error('acquisition_date')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="supplier" class="block text-white font-medium mb-2">Supplier</label>
                        <input type="text" value="{{ old('supplier', $acquisition->supplier) }}" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="supplier" name="supplier" required>
                        @error('supplier')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="cost" class="block text-white font-medium mb-2">Cost</label>
                        <input type="number" step="0.01" value="{{ old('cost', $acquisition->cost) }}" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="cost" name="cost" required min="0">
                        @error('cost')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="quantity_added" class="block text-white font-medium mb-2">Quantity Added</label>
                        <input type="number" value="{{ old('quantity_added', $acquisition->quantity_added) }}" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="quantity_added" name="quantity_added" required min="1">
                        @error('quantity_added')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="notes" class="block text-white font-medium mb-2">Notes</label>
                        <textarea class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="notes" name="notes" rows="3">{{ old('notes', $acquisition->notes) }}</textarea>
                        @error('notes')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex space-x-4">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Update Acquisition</button>
                    <a href="{{ route('acquisitions.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
