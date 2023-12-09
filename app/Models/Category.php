<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'stock',
        'author_id',
        'category_id',
    ];

    public function authors()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'books_category', 'book_id', 'category_id');
    }
}
