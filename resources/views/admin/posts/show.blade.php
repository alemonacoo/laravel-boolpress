@extends('layouts.dashboard')

@section('content')
     <h5>{{$post->title}}</h3>
     <p>{{$post->content}}</p>
     <a href="{{route('admin.posts.edit', $post)}}">Modifica</a>
     <a href="{{route('admin.posts.edit', $post)}}">Elimina</a>
@endsection