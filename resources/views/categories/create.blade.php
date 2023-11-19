@extends('layout')

@section('content')

<h1>Uj kategoria</h1>



<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Kategoria neve</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection
