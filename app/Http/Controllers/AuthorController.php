<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();
        return view('authors', ['authors' => $authors]);
    }

    public function addAuthor() {
        return view('authorAdd');
    }

    function storeAuthor(Request $request) {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        Author::create($validated);
        return redirect('authors');
    }

    function editAuthor($id) {
        $author = Author::where('id', $id)->first();
        return view('authorEdit', ['author' => $author]);
    }

    function updateAuthor(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|unique:authors'
        ]);

        $author = Author::where('id', $id)->first();
        $author->update($request->all());
        return redirect('authors');
    }

    function deleteAuthor($id) {
        $author = Author::where('id', $id)->first();
        $author->delete();
        return redirect('authors');
    }
}
