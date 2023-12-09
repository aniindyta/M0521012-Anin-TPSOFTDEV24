@extends('mainlayout')

@section('title', 'Book')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Data Book</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="book-add" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Name</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="name" class="form-control" name="name"
                                                placeholder="Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Year</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="year" class="form-control" name="year"
                                                placeholder="Year">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Stock</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="stock" class="form-control" name="stock"
                                                placeholder="Stock">
                                        </div>  
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Author</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="author_id" id="author_id" class="choices form-select" required>
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>                                                                            
                                        <div class="col-md-4">
                                            <label for="categories">Categories</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            @foreach ($categories as $category)
                                                <div class="form-check">
                                                    <input type="checkbox" id="category_{{ $category->id }}" class="form-check-input" name="categories[]" value="{{ $category->id }}">
                                                    <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection