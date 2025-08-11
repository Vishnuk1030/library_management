<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function index(Request $request)
    {
        $query = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.id', 'books.title', 'books.description', 'authors.author_name', 'authors.author_email');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('books.title', 'like', "%{$search}%")
                    ->orWhere('books.description', 'like', "%{$search}%")
                    ->orWhere('authors.author_name', 'like', "%{$search}%")
                    ->orWhere('authors.author_email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('author_name')) {
            $query->where('authors.author_name', $request->author_name);
        }

        $datas = $query->paginate(5)->withQueryString();

        $authors = DB::table('authors')->select('author_name')->distinct()->pluck('author_name');

        return view('home', compact('datas', 'authors'));
    }
}
