<x-layout title="Edit Borrowing">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Edit Borrowing</h1>

        <div class="glass-card rounded-lg p-6">
            <form action="{{ route('borrowings.update', $borrowing) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="user_id" class="block text-white font-medium mb-2">Borrower</label>
                        <select class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="user_id" name="user_id" required>
                            <option value="">Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $borrowing->user_id) == $user->id ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="book_id" class="block text-white font-medium mb-2">Book</label>
                        <select class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="book_id" name="book_id" required>
                            <option value="">Select Book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id', $borrowing->book_id) == $book->id ? 'selected' : '' }}>{{ $book->title }} by {{ $book->author }}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="borrow_date" class="block text-white font-medium mb-2">Borrow Date</label>
                        <input type="date" value="{{ old('borrow_date', $borrowing->borrow_date->format('Y-m-d')) }}" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="borrow_date" name="borrow_date" required>
                        @error('borrow_date')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="due_date" class="block text-white font-medium mb-2">Due Date</label>
                        <input type="date" value="{{ old('due_date', $borrowing->due_date->format('Y-m-d')) }}" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="due_date" name="due_date" required>
                        @error('due_date')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="return_date" class="block text-white font-medium mb-2">Return Date</label>
                        <input type="date" value="{{ old('return_date', $borrowing->return_date? $borrowing->return_date->format('Y-m-d') : '') }}" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="return_date" name="return_date">
                        @error('return_date')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-white font-medium mb-2">Status</label>
                        <select class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="status" name="status" required>
                            <option value="pending" {{ old('status', $borrowing->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="returned" {{ old('status', $borrowing->status) == 'returned' ? 'selected' : '' }}>Returned</option>
                            <option value="overdue" {{ old('status', $borrowing->status) == 'overdue' ? 'selected' : '' }}>Overdue</option>
                        </select>
                        @error('status')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="fine_amount" class="block text-white font-medium mb-2">Fine Amount</label>
                        <input type="number" step="0.01" value="{{ old('fine_amount', $borrowing->fine_amount) }}" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="fine_amount" name="fine_amount" min="0">
                        @error('fine_amount')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex space-x-4">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Update Borrowing</button>
                    <a href="{{ route('borrowings.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
