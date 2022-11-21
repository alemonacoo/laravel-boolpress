@extends('layouts.dashboard')

@section('content')
<div class="row">
    <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Category Name</label>
        <input type="text" name="name" maxlength="30" required value="{{ old('name', $category->name) }}">
    </div>

    <div>
        <input type="submit" value="Aggiorna">
    </div>

    </form>
</div>
@endsection