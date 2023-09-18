<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function allbook()
    {
        $result = Book::all();
        return view('books.admin',compact('result'));
    }
    
    public function index()
    {
        $result = Book::where('user_id', Auth::user()->id)->get();
        return view('books.index',compact('result'));
    }
    
    public function create()
    {
        return view('books.add');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        
        $fileName = time() . '.' . $request->cover->extension();
        $request->cover->storeAs('public/images', $fileName);
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $fileName,
            'user_id'=> Auth::user()->id,
        ]);
        return redirect()->route('books.index')->withSuccess('Book added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $book = Book::findOrFail($id);
        if ($request->cover != null) {
            $fileName = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('public/images', $fileName);
            $book->cover = $fileName;
        }
        $book->title = $request->input('title');
        $book->description = $request->input('description');

        $book->save();
        if (Auth::user()->role == 'administrator') {
            return redirect()->route('books.allbook')->withSuccess('Book info updated successfully.');
        }else{
            return redirect()->route('books.index')->withSuccess('Book info updated successfully.');

        }
    }
    public function show($id)
    {
        $book = Book::find($id);
        if ($book->user_id == Auth::user()->id || Auth::user()->role == 'administrator') {
            return view('books.edit',compact('book'));
        } else {
            return redirect()->route('books.index')->withWarning('You are not authorized to delete this book!');
        }
    }

    public function destroy($id)
    {   
        $book = Book::findOrFail($id);
        if ($book->user_id == Auth::user()->id || Auth::user()->role == 'administrator') {
            $book->delete();
            if (Auth::user()->role == 'administrator') {
                return redirect()->route('books.allbook')->withSuccess('Book info updated successfully.');
            }else{
                return redirect()->route('books.index')->withSuccess('Book info updated successfully.');
            }
        } else {
            return redirect()->route('books.index')->withWarning('You are not authorized to delete this book!');
        }

    }
}
