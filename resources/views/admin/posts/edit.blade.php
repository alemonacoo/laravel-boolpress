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
    <div>
        <label for="category_id">Categoria:</label>
        <select name="category_id">
            <option value="">Nessuna</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }} {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}">
                {{ $category->name }}
            </option>    
            @endforeach
        </select>
        </div>
    <input type="submit" value="Aggiorna">
    </form>
@endsection