@extends('layouts.dashboard')

@section('content')
    <h4>{{ $tag->name }}</h4>

    <form action="{{ route('admin.tags.update', $tag->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name">
        <input type="submit" value="Modifica">
    </form>
    <form action="{{ route('admin.tags.destroy', $tag->slug) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Elimina">
    </form>

    @foreach ($tag->posts as $post)
        <div class="my-2">
           <a href="{{ route('admin.posts.show', $post->slug) }}">{{ $post->title }}</a> 
        </div>
        
    @endforeach

@endsection