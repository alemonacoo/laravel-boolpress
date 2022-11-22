@extends('layouts.dashboard')

@section('content')
    <h4>{{ $tag->name }}</h4>

    <form action="{{ route('admin.tags.update', $tag->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name">
        <input type="submit" value="Modifica">
    </form>
    <form action="{{ route('admin.tags.destroy', $tag->slug) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Elimina">
    </form>
@endsection