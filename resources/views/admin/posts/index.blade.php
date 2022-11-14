@extends('layouts.dashboard')

@section('content')
    <div class="row">
        @foreach ($posts as $post)
            <p>{{$post['title']}}</p>

            
        @endforeach

    </div>
    
@endsection