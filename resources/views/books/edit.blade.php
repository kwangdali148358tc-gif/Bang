<x-layout>
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Edit Book</h1>

        <div class="glass-card rounded-lg p-6">
            <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-white font-medium mb-2">Title</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="title" name="title" value="{{ old('title', $book->title) }}" required>
                    </div>

                    <div>
                        <label for="author" class="block text-white font-medium mb-2">Author</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="author" name="author" value="{{ old('author', $book->author) }}" required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-white font-medium mb-2">Description</label>
                        <textarea class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="description" name="description" rows="3" required>{{ old('description', $book->description) }}</textarea>
                    </div>

                    <div>
                        <label for="genre" class="block text-white font-medium mb-2">Genre</label>
                        <select class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="genre" name="genre" required>
                            <option value="">Select Genre</option>
                            <option value="Fiction" {{ old('genre', $book->genre) == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="Sci-Fi" {{ old('genre', $book->genre) == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                            <option value="Fantasy" {{ old('genre', $book->genre) == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                            <option value="Mystery" {{ old('genre', $book->genre) == 'Mystery' ? 'selected' : '' }}>Mystery</option>
                            <option value="Romance" {{ old('genre', $book->genre) == 'Romance' ? 'selected' : '' }}>Romance</option>
                            <option value="Biography" {{ old('genre', $book->genre) == 'Biography' ? 'selected' : '' }}>Biography</option>
                            <option value="History" {{ old('genre', $book->genre) == 'History' ? 'selected' : '' }}>History</option>
                            <option value="Other" {{ old('genre', $book->genre) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="published_year" class="block text-white font-medium mb-2">Published Year</label>
                        <input type="number" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="published_year" name="published_year" value="{{ old('published_year', $book->published_year) }}" required>
                    </div>

                    <div>
                        <label for="isbn" class="block text-white font-medium mb-2">ISBN</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
                    </div>

                    <div>
                        <label for="pages" class="block text-white font-medium mb-2">Pages</label>
                        <input type="number" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="pages" name="pages" value="{{ old('pages', $book->pages) }}" required>
                    </div>

                    <div>
                        <label for="language" class="block text-white font-medium mb-2">Language</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="language" name="language" value="{{ old('language', $book->language) }}" required>
                    </div>

                    <div>
                        <label for="publisher" class="block text-white font-medium mb-2">Publisher</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
                    </div>

                    <div>
                        <label for="price" class="block text-white font-medium mb-2">Price</label>
                        <input type="number" step="0.01" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="price" name="price" value="{{ old('price', $book->price) }}" required>
                    </div>

                    <div>
                        <label for="cover_image" class="block text-white font-medium mb-2">Cover Image</label>
                        <input type="file" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="cover_image" name="cover_image" accept="image/*">
                        @if($book->cover_image)
                            <small class="text-slate-400 block mt-1">Leave empty to keep current image.</small>
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Current Cover" class="w-24 h-auto mt-2 rounded">
                        @endif
                    </div>

                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" class="mr-2" id="is_available" name="is_available" value="1" {{ old('is_available', $book->is_available) ? 'checked' : '' }}>
                            <span class="text-white">Is Available</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6 flex space-x-4">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Update Book</button>
                    <a href="{{ route('books.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>