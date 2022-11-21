@extends('layouts.dashboard')

@section('content')
<div class="row">
    <form action="{{route('admin.categories.store')}}" method="POST">
    @csrf
    <div>
        <label for="name">Category Name</label>
        <input type="text" name="name" maxlength="30" required>
    </div>

    <div>
        <input type="submit" value="Crea">
    </div>

    </form>
</div>
@endsection