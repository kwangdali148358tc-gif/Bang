<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
$query = Borrowing::with(['user', 'book']);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            })->orWhereHas('book', function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        $borrowings = $query->paginate(10);

        $statuses = ['pending', 'returned', 'overdue'];

        return view('borrowings.index', compact('borrowings', 'statuses'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::where('is_available', true)->get();

        return view('borrowings.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'status' => 'required|in:pending,returned,overdue',
        ]);

        $book = Book::findOrFail($request->book_id);
        if (!$book->is_available) {
            return back()->withErrors(['book_id' => 'Book is not available.']);
        }

        $borrowDate = \Carbon\Carbon::parse($request->borrow_date);
        $dueDate = $borrowDate->copy()->addDays(14);

        Borrowing::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => $borrowDate,
            'due_date' => $dueDate,
            'status' => $request->status ?? 'pending',
            'fine_amount' => 0,
        ]);

        $book->update(['is_available' => false]);

        return redirect()->route('borrowings.index')->with('success', 'Borrowing created successfully.');
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load('user', 'book');

        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing)
    {
        $users = User::all();
        $books = Book::all();

        return view('borrowings.edit', compact('borrowing', 'users', 'books'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:due_date',
            'status' => 'required|in:pending,returned,overdue',
            'fine_amount' => 'nullable|numeric|min:0',
        ]);

        $book = Book::findOrFail($request->book_id);
        if ($request->status === 'returned') {
            $book->update(['is_available' => true]);
        } elseif ($request->status === 'pending') {
            $book->update(['is_available' => false]);
        }

        $borrowing->update($request->all());

        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated successfully.');
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status === 'pending') {
            $borrowing->book->update(['is_available' => true]);
        }

        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Borrowing deleted successfully.');
    }
}

