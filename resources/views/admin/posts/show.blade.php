@extends('layouts.dashboard')

@section('content')
     <h5>{{$post->title}}</h3>
     <p>{{$post->content}}</p>
     @if ($post->category)
          <p>CATEGORIA: <a href="{{ route('admin.categories.show', $post->category->id) }}"> {{ $post->category->name }}</a></p>
     @else
          <p>Nessuna Categoria</p>
     @endif
     <div>
          Tags:
     @foreach ($post->tags as $tag)
          <span>{{$tag->name}}</span>
     @endforeach
     </div>

     <button>
     <a href="{{route('admin.posts.edit', $post)}}">Modifica</a>
     </button>
     <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <input onclick="confirm('Are you sure?')" type="submit" value="Cancella">
     </form>
@endsection