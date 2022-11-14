@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <a class="my-4" href="{{route('admin.posts.create')}}">Nuovo</a>
        @foreach ($posts as $post)
            <a href="{{route('admin.posts.show', $post->id)}}"><p>{{$post['title']}}</p></a>
        @endforeach

    </div>
    
@endsection