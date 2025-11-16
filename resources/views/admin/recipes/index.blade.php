@extends('layouts/app')

@section('content')
<h2>Recipes</h2>

<a href="{{ route('recipes.create') }}" class="btn btn-primary">Add Recipe</a>

<table class="table mt-3">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

    @foreach($recipes as $recipe)
    <tr>
        <td>{{ $recipe->id }}</td>
        <td>{{ $recipe->title }}</td>
        <td>{{ $recipe->category->name ?? '' }}</td>
        <td>
            @if($recipe->image)
                <img src="{{ asset('storage/'.$recipe->image) }}" height="50">
            @endif
        </td>
        <td>
            <a href="{{ route('recipes.edit',$recipe->id) }}" class="btn btn-sm btn-info">Edit</a>
            
            <form method="POST" action="{{ route('recipes.destroy',$recipe->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $recipes->links() }}
@endsection
