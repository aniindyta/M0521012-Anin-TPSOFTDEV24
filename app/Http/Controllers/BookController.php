<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::with('authors')->get();
        return view('dashboard', ['books' => $books]);
    }

    public function addBook() {
        $authors = Author::all();
        $categories = Category::all();
        return view('bookAdd', ['authors' => $authors, 'categories' => $categories]);
    }

    public function storeBook(Request $request) { 
        $validatedData = $request->validate([ 
            'name' => 'required', 
            'year' => 'required', 
            'stock' => 'required',
            'author_id' => 'required',  
            'categories' => 'required|array', 
        ]); 
        
        $author_id = $request->input('author_id');

        $category_ids = $request->input('categories'); 
        $category_id = array_values($category_ids)[0]; 

        $validatedData['category_id'] = $category_id; 
        $validatedData['author_id'] = $author_id; 

        $book = Book::create($validatedData); 
        $book->categories()->attach($category_ids); 

        return redirect('books')->with('success', 'Book added successfully.'); 
    }
    
    public function editBook($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all(); 
        $categories = Category::all(); 

        return view('bookEdit', ['book' => $book, 'authors' => $authors, 'categories' => $categories]);
    }

    public function updateBook(Request $request, $id) {
        $validatedData = $request->validate([ 
            'name' => 'required', 
            'year' => 'required', 
            'stock' => 'required',
            'author_id' => 'required',  
            'categories' => 'required|array', 
        ]); 
        
        $author_id = $request->input('author_id');

        $category_ids = $request->input('categories'); 
        $category_id = array_values($category_ids)[0]; 

        $validatedData['category_id'] = $category_id; 
        $validatedData['author_id'] = $author_id; 

        $book = Book::where('id', $id)->first();
        $book->categories()->attach($category_ids); 

        return redirect('books')->with('success', 'Book added successfully.'); 
    }
    
    function deleteBook($id) {
        $book = Book::where('id', $id)->first();
        $book->delete();
        return redirect('books');
    }
}
