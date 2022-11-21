@extends('layouts.dashboard')

@section('content')
    <h4>{{$category->name}}</h4>
    @foreach($category->posts as $post)   
    <div class="my-2">
    <a href="{{route('admin.posts.show', $post->id)}}">{{$post['title']}}</a>
    [{{$category->name}}]
    </div>     
    @endforeach
@endsection