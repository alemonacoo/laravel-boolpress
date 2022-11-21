@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.update', $post->slug)}}" method="POST">
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

        {{-- Tags: --}}
    @if($errors->any())
        <div>
        <label>Tags:</label>
        @foreach ($tags as $tag)
            <input 
            {{ in_array($tag->id, old('tags', [])) ? 'checked' : ''}} 
            type="checkbox" name="tags[]" value="{{$tag->id}}">
        <label>{{ $tag['name']}}</label>

        @endforeach
        </div>
    @else
        <div>
        <label>Tags:</label>
        @foreach ($tags as $tag)
            <input 
            {{ $post->tags->contains($tag) ? 'checked' : ''}} 
            type="checkbox" name="tags[]" value="{{$tag->id}}">
        <label>{{ $tag['name']}}</label>

        @endforeach
        </div>
    @endif
    <input type="submit" value="Aggiorna">
    </form>
@endsection