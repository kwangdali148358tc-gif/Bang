<x-layout title="Borrowing Details">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Borrowing Details</h1>

        <div class="glass-card rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-white font-medium mb-2">Borrower</label>
                    <p class="text-slate-300">{{ $borrowing->user->first_name }} {{ $borrowing->user->last_name }}</p>
                </div>

                <div>
                    <label class="block text-white font-medium mb-2">Book</label>
                    <p class="text-slate-300">{{ $borrowing->book->title }} by {{ $borrowing->book->author }}</p>
                </div>

                <div>
                    <label class="block text-white font-medium mb-2">Borrow Date</label>
                    <p class="text-slate-300">{{ $borrowing->borrow_date->format('Y-m-d') }}</p>
                </div>

                <div>
                    <label class="block text-white font-medium mb-2">Due Date</label>
                    <p class="text-slate-300">{{ $borrowing->due_date->format('Y-m-d') }}</p>
                </div>

                @if($borrowing->return_date)
                <div>
                    <label class="block text-white font-medium mb-2">Return Date</label>
                    <p class="text-slate-300">{{ $borrowing->return_date->format('Y-m-d') }}</p>
                </div>
                @endif

                <div>
                    <label class="block text-white font-medium mb-2">Status</label>
                    @switch($borrowing->status)
                        @case('pending')
                            <span class="bg-blue-600 text-white px-3 py-1 rounded text-sm font-medium">Pending</span>
                            @break
                        @case('returned')
                            <span class="bg-green-600 text-white px-3 py-1 rounded text-sm font-medium">Returned</span>
                            @break
                        @case('overdue')
                            <span class="bg-red-600 text-white px-3 py-1 rounded text-sm font-medium">Overdue</span>
                            @break
                    @endswitch
                </div>

                <div class="md:col-span-2">
                    <label class="block text-white font-medium mb-2">Fine Amount</label>
                    <p class="text-slate-300">${{ number_format($borrowing->fine_amount, 2) }}</p>
                </div>
            </div>

            <div class="mt-8 flex space-x-4">
                <a href="{{ route('borrowings.edit', $borrowing) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <a href="{{ route('borrowings.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>
        </div>
    </div>
</x-layout>
