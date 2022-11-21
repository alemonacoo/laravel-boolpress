@extends('layouts.dashboard')

@section('content')
    <h4>{{$category->name}}</h4>
    <button class="my-2"><a href="{{ route('admin.categories.edit', $category->slug) }}">Edit</a></button>
    <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="my-2" type="submit" value="delete">Delete</button>
    </form>


    @foreach($category->posts as $post)   
    <div class="my-2">
    <a href="{{route('admin.posts.show', $post->slug)}}">{{$post['title']}}</a>
    [{{$category->name}}]
    </div>     
    @endforeach
@endsection