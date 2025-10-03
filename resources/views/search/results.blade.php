@extends('layouts.app')

@section('content')

<!-- Display search results -->
<h2>Search Results for "{{ $query }}"</h2>


<!-- Search Form at the top of the page -->
<form action="{{ route('search.results') }}" method="GET">
    <input type="text" name="query" value="{{ old('query', $query) }}" placeholder="Search recipes or restaurants" required>
    
    <select name="type">
        <option value="all" {{ $type === 'all' ? 'selected' : '' }}>All</option>
        <option value="recipes" {{ $type === 'recipes' ? 'selected' : '' }}>Recipes</option>
        <option value="restaurants" {{ $type === 'restaurants' ? 'selected' : '' }}>Restaurants</option>
    </select>
    
    <button type="submit">Search</button>
</form>



@if($recipes->isEmpty() && $restaurants->isEmpty())
    <p>No results found.</p>
@endif

@if($recipes->isNotEmpty())
    <h3>Recipes</h3>
    @foreach($recipes as $recipe)
        <div><a href="{{ route('recipes.show', $recipe->slug) }}">{{ $recipe->title }}</a></div>
    @endforeach
@endif

@if($restaurants->isNotEmpty())
    <h3>Restaurants</h3>
    @foreach($restaurants as $restaurant)
        <div><a href="{{ route('biz', $restaurant->id) }}" target="_BLANK">{{ $restaurant->business_name }}</a></div>
    @endforeach
@endif

@endsection