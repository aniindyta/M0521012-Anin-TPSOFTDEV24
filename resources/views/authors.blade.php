@extends('mainlayout')

@section('title', 'Author')

@section('content')
<div style="display: flex; justify-content:flex-end;margin-bottom: 10px";>
    <a href="author-add" class="btn icon icon-left btn-primary">+ Add Author</a>
</div>
     <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Book Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @foreach ($item->books as $items)
                                            {{$items->name}}</br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <span><a href="author-edit/{{$item->id}}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a></span>
                                        <span><a href="author-delete/{{$item->id}}" class="btn icon btn-danger"><i class="bi bi-x"></i></a></span>
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