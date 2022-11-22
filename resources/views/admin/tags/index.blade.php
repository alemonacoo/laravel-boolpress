@extends('layouts.dashboard')

@section('content')
        @foreach ($tags as $tag)
            <div class="my-2">
            <a href="{{ route('admin.tags.show', $tag->slug) }}">{{ $tag->name }}</a>    
            </div>            
        @endforeach
        <form action="{{route('admin.tags.store')}}" method="POST">
            @csrf
            <div>
                <label for="name">Aggiungi Tag:</label>
                <input type="text" name="name">
            </div>
            <div>
                <input type="submit" value="Aggiungi">
            </div>
            </form>
@endsection