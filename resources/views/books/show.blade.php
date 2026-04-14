<x-layout>
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">{{ $book->title }}</h1>

        <div class="glass-card rounded-lg p-6">
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" class="w-48 h-auto mb-6 rounded-lg">
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-white">
                <div>
                    <p class="mb-2"><strong>Author:</strong> {{ $book->author }}</p>
                    <p class="mb-2"><strong>Genre:</strong> {{ $book->genre }}</p>
                    <p class="mb-2"><strong>Published Year:</strong> {{ $book->published_year }}</p>
                    <p class="mb-2"><strong>ISBN:</strong> {{ $book->isbn }}</p>
                    <p class="mb-2"><strong>Pages:</strong> {{ $book->pages }}</p>
                </div>
                <div>
                    <p class="mb-2"><strong>Language:</strong> {{ $book->language }}</p>
                    <p class="mb-2"><strong>Publisher:</strong> {{ $book->publisher }}</p>
                    <p class="mb-2"><strong>Price:</strong> ${{ number_format($book->price, 2) }}</p>
                    <p class="mb-2"><strong>Available:</strong> {{ $book->is_available ? 'Yes' : 'No' }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="mb-2"><strong>Description:</strong></p>
                    <p>{{ $book->description }}</p>
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('books.edit', $book) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <a href="{{ route('books.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Back to List</a>
            </div>
        </div>
    </div>
</x-layout>