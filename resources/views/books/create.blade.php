<x-layout>
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Add New Book</h1>

        <div class="glass-card rounded-lg p-6">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-white font-medium mb-2">Title</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="title" name="title" required>
                    </div>

                    <div>
                        <label for="author" class="block text-white font-medium mb-2">Author</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="author" name="author" required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-white font-medium mb-2">Description</label>
                        <textarea class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div>
                        <label for="genre" class="block text-white font-medium mb-2">Genre</label>
                        <select class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="genre" name="genre" required>
                            <option value="">Select Genre</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Romance">Romance</option>
                            <option value="Biography">Biography</option>
                            <option value="History">History</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="published_year" class="block text-white font-medium mb-2">Published Year</label>
                        <input type="number" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="published_year" name="published_year" required>
                    </div>

                    <div>
                        <label for="isbn" class="block text-white font-medium mb-2">ISBN</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="isbn" name="isbn" required>
                    </div>

                    <div>
                        <label for="pages" class="block text-white font-medium mb-2">Pages</label>
                        <input type="number" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="pages" name="pages" required>
                    </div>

                    <div>
                        <label for="language" class="block text-white font-medium mb-2">Language</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="language" name="language" required>
                    </div>

                    <div>
                        <label for="publisher" class="block text-white font-medium mb-2">Publisher</label>
                        <input type="text" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="publisher" name="publisher" required>
                    </div>

                    <div>
                        <label for="price" class="block text-white font-medium mb-2">Price</label>
                        <input type="number" step="0.01" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="price" name="price" required>
                    </div>

                    <div>
                        <label for="cover_image" class="block text-white font-medium mb-2">Cover Image</label>
                        <input type="file" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" id="cover_image" name="cover_image" accept="image/*">
                    </div>

                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" class="mr-2" id="is_available" name="is_available" value="1" checked>
                            <span class="text-white">Is Available</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6 flex space-x-4">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Create Book</button>
                    <a href="{{ route('books.index') }}" class="bg-slate-600 hover:bg-slate-500 text-white font-bold py-2 px-4 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>