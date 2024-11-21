@extends('admin.app')
@section('content')
    <div class="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                </div>
                <div class="card-body">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                        </div>
                        <form class="user" method="POST" action="{{route('category.update', $category->id)}}">
                            @csrf 
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" class="form-control" id="name"
                                    placeholder="Name Category" name='name' value="{{$category->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="active" name='is_active' {{$category->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked">
                                      Active
                                    </label>
                                  </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
