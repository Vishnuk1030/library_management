<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {
        return view('Author.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:authors,author_email'
        ]);

        $author = Authors::create([
            'author_name' => $request->name,
            'author_email' => $request->email
        ]);

        return redirect()->route('author.create')->with('success', 'Author created successfully');
    }
}
