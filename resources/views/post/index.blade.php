@extends('admin.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="card-body">
        <a href="{{route('post.create')}}" class="btn btn-primary float-right">Add post</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Body</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td><img src="{{asset('storage/post/'.$item->image)}}" alt="" width="100"></td>
                        <td>{{$item->body}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>
                            <a href="{{route('post.show', $item->id)}}" class="btn btn-info">Show</a>
                            <a href="{{route('post.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                             DELETE
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
 @endsection

 