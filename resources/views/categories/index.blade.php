@extends('layout')

@section('content')
<h1>Kategoriak</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach($categories as $category)
        <li>
            {{ $category->name }}
            <a href="{{ route('categories.show', $category->id) }}" class="button">Megjelenites</a>
            <a href="{{ route('categories.edit', $category->id) }}" class="button">Szerkesztes</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="danger" onclick="return confirm('Tutira toroljuk?')">Torles</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
