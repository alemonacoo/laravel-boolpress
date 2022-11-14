@extends('layouts.dashboard')

@section('content')
    <div class="row">
        @foreach ($posts as $post)
            <a href="{{route('admin.posts.show', $post->id)}}"><p>{{$post['title']}}</p></a>

            
        @endforeach

    </div>
    
@endsection