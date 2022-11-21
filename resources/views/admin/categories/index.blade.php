@extends('layouts.dashboard')

@section('content')
<div class="row">
    <button class="my-2">
    <a href="{{route('admin.categories.create')}}">Nuovo</a>
    </button>
    @foreach ($categories as $category)
        <div class="col-12 my-2">
        <a href="{{route('admin.categories.show', $category->slug)}}">{{$category['name']}}</a>
        </div>
    @endforeach
</div>
@endsection