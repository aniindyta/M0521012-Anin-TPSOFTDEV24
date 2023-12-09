@extends('mainlayout')

@section('title', 'Category')

@section('content')
<div style="display: flex; justify-content:flex-end;margin-bottom: 10px";>
    <a href="category-add" class="btn icon icon-left btn-primary">+ Add Category</a>
</div>
     <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Genre</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <span><a href="category-edit/{{$item->id}}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a></span>
                                        <span><a href="category-delete/{{$item->id}}" class="btn icon btn-danger"><i class="bi bi-x"></i></a></span>
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