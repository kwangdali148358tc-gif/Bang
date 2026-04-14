<?php

namespace App\Http\Controllers;

use App\Models\Acquisition;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcquisitionController extends Controller
{
    public function index(Request $request)
    {
$query = Acquisition::with('book');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('book', function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            })->orHas('supplier', 'like', "%{$search}%");
        }

        $acquisitions = $query->paginate(10);

        return view('acquisitions.index', compact('acquisitions'));
    }

    public function create()
    {
        $books = Book::all();

        return view('acquisitions.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'acquisition_date' => 'required|date',
            'supplier' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'quantity_added' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        Acquisition::create($request->all());

        return redirect()->route('acquisitions.index')->with('success', 'Acquisition created successfully.');
    }

    public function show(Acquisition $acquisition)
    {
        $acquisition->load('book');

        return view('acquisitions.show', compact('acquisition'));
    }

    public function edit(Acquisition $acquisition)
    {
        $books = Book::all();

        return view('acquisitions.edit', compact('acquisition', 'books'));
    }

    public function update(Request $request, Acquisition $acquisition)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'acquisition_date' => 'required|date',
            'supplier' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'quantity_added' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $acquisition->update($request->all());

        return redirect()->route('acquisitions.index')->with('success', 'Acquisition updated successfully.');
    }

    public function destroy(Acquisition $acquisition)
    {
        $acquisition->delete();

        return redirect()->route('acquisitions.index')->with('success', 'Acquisition deleted successfully.');
    }
}

