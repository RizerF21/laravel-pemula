@extends('admin.app')
@section('content')
    <div class="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                </div>
                <div class="card-body">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add POST</h1>
                        </div>
                        <form class="user" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="name"
                                    placeholder="Title" name='title'>
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="body"
                                    placeholder="Body" name='body'></textarea>
                                    @error('body')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="category_id" name='category_id'>
                                    <option value="">Select Category</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" id="image"
                                    placeholder="Image" name='image'>
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                SAVE </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
