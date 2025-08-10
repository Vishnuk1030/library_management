<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function create()
    {
        return view('Book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $book = Books::create([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('book.create')->with('success', 'Book created successfully');
    }

    public function manage()
    {

        return view('home');
    }
}
