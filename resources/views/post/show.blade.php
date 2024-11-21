@extends('admin.app')
@section('content')
    <h1>{{$post->title}}</h1>
    <img src="{{asset('storage/post/'.$post->image)}}" alt="">
    <p>{{$post->body}}</p>
    <a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
@endsection