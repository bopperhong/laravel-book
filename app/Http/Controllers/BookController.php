<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();

        return view('books.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0.01',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->seller = auth()->user()->name;
        $book->save();

        if ($request->hasFile('cover_image')) {
            $media = $book->addMedia($request->file('cover_image'))->toMediaCollection('cover_images');

            $relativePath = str_replace(storage_path('app/public/'), 'storage/', $media->getPath());
            $book->cover_image = $relativePath;
            $book->save();
        }

        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }
}
