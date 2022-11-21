@extends('layouts.dashboard')

@section('content')
    <h4>{{$category->name}}</h4>
    <button><a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a></button>
    {{-- <button><a href="{{ route('admin.categories.edit') }}">ELIMINA</a></button> --}}
    @foreach($category->posts as $post)   
    <div class="my-2">
    <a href="{{route('admin.posts.show', $post->id)}}">{{$post['title']}}</a>
    [{{$category->name}}]
    </div>     
    @endforeach
@endsection