@extends('mainlayout')

@section('title', 'Book')

@section('content')
<div style="display: flex; justify-content:flex-end;margin-bottom: 10px";>
    <a href="book-add" class="btn icon icon-left btn-primary">+ Add Book</a>
</div>
     <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Year</th>
                                <th>Stock</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->year}}</td>
                                <td>{{$item->stock}}</td>
                                <td>{{$item->authors['name']}}</td>
                                <td>
                                    @foreach ($item->categories as $data)
                                        {{$data->name}} </br>
                                    @endforeach
                                </td>
                                <td>
                                    {{-- <span><a href="book-edit/{{$item->id}}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a></span> --}}
                                    <span><a href="book-delete/{{$item->id}}" class="btn icon btn-danger"><i class="bi bi-x"></i></a></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection