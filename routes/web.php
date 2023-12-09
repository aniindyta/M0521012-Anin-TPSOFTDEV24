<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('authors', [AuthorController::class, 'index']);
Route::get('author-add', [AuthorController::class, 'addAuthor']);
Route::post('author-add', [AuthorController::class, 'storeAuthor']);
Route::get('author-edit/{id}', [AuthorController::class, 'editAuthor']);
Route::post('author-edit/{id}', [AuthorController::class, 'updateAuthor']);
Route::get('author-delete/{id}', [AuthorController::class, 'deleteAuthor']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('category-add', [CategoryController::class, 'addCategory']);
Route::post('category-add', [CategoryController::class, 'storeCategory']);
Route::get('category-edit/{id}', [CategoryController::class, 'editCategory']);
Route::post('category-edit/{id}', [CategoryController::class, 'updateCategory']);
Route::get('category-delete/{id}', [CategoryController::class, 'deleteCategory']);

Route::get('/', [BookController::class, 'index']);
Route::get('book-add', [BookController::class, 'addBook']);
Route::post('book-add', [BookController::class, 'storeBook']);
Route::get('book-edit/{id}', [BookController::class, 'editBook']);
Route::post('book-edit/{id}', [BookController::class, 'updateBook']);
Route::get('book-delete/{id}', [BookController::class, 'deleteBook']);