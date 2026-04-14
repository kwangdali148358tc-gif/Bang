<x-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Books Management</h1>

        <a href="{{ route('books.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg mb-6 inline-block">Add New Book</a>

        <!-- Search and Filter Form -->
        <div class="mb-6 bg-slate-800 p-4 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <input type="text" name="search" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none" placeholder="Search by title or author" value="{{ request('search') }}">
                </div>
                <div>
                    <select name="genre" class="w-full px-3 py-2 bg-slate-700 text-white rounded border border-slate-600 focus:border-indigo-500 focus:outline-none">
                        <option value="">All Genres</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-lg overflow-hidden">
            <table class="w-full text-white">
                <thead class="bg-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Title</th>
                        <th class="px-4 py-3 text-left">Author</th>
                        <th class="px-4 py-3 text-left">Genre</th>
                        <th class="px-4 py-3 text-left">Price</th>
                        <th class="px-4 py-3 text-left">Available</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr class="border-t border-slate-600">
                            <td class="px-4 py-3">{{ $book->title }}</td>
                            <td class="px-4 py-3">{{ $book->author }}</td>
                            <td class="px-4 py-3">{{ $book->genre }}</td>
                            <td class="px-4 py-3">${{ number_format($book->price, 2) }}</td>
                            <td class="px-4 py-3">
                                @if($book->is_available)
                                    <span class="bg-green-600 text-white px-2 py-1 rounded text-sm">Yes</span>
                                @else
                                    <span class="bg-red-600 text-white px-2 py-1 rounded text-sm">No</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('books.show', $book) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">View</a>
                                <a href="{{ route('books.edit', $book) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $books->appends(request()->query())->links() }}
        </div>
    </div>

    <script>
        const csrfToken = '{{ csrf_token() }}';
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="search"]');
            const genreSelect = document.querySelector('select[name="genre"]');
            const tableBody = document.querySelector('tbody');

            function fetchBooks() {
                const search = searchInput.value;
                const genre = genreSelect.value;

                fetch(`{{ route('books.index') }}?search=${encodeURIComponent(search)}&genre=${encodeURIComponent(genre)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(books => {
                    tableBody.innerHTML = books.map(book => `
                        <tr class="border-t border-slate-600">
                            <td class="px-4 py-3">${book.title}</td>
                            <td class="px-4 py-3">${book.author}</td>
                            <td class="px-4 py-3">${book.genre}</td>
                            <td class="px-4 py-3">$${parseFloat(book.price).toFixed(2)}</td>
                            <td class="px-4 py-3">
                                ${book.is_available ?
                                    '<span class="bg-green-600 text-white px-2 py-1 rounded text-sm">Yes</span>' :
                                    '<span class="bg-red-600 text-white px-2 py-1 rounded text-sm">No</span>'
                                }
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ url('books') }}/${book.id}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">View</a>
                                <a href="{{ url('books') }}/${book.id}/edit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ url('books') }}/${book.id}" method="POST" class="inline">
                                    <input type="hidden" name="_token" value="${csrfToken}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    `).join('');
                })
                .catch(error => console.error('Error:', error));
            }

            // Debounce function to limit API calls
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            const debouncedFetch = debounce(fetchBooks, 300);

            searchInput.addEventListener('input', debouncedFetch);
            genreSelect.addEventListener('change', fetchBooks);
        });
    </script>
</x-layout>