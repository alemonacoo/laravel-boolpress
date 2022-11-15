@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.update', $post->id)}}" method="POST">
    @csrf
    @method('PATCH')
    <div>
        <label for="title">Titolo:</label>
        <input type="text" required minlength="1" maxlength="255" name="title" value="{{old('title', $post->title)}}">
    </div>
    <div>
        <label for="content">Contenuto:</label>
        <textarea name="content" cols="50" rows="10">{{old('content', $post->content)}}</textarea>
    </div>
    <input type="submit" value="Aggiorna">
    </form>
@endsection