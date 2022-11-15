@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <button>
        <a class="my-4" href="{{route('admin.posts.create')}}">Nuovo</a>
        </button>
        @foreach ($posts as $post)
            <p>
            <a href="{{route('admin.posts.show', $post->id)}}">{{$post['title']}}</a>
            </p>
        @endforeach

    </div>
    
@endsection