@extends('layouts/app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Add Recipe</h2>
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary" target="_blank">
            View Recipe List
        </a>
    </div>

    <div class="card mt-3">
        <div class="card-body">

            @include('admin.recipes._form', [
                'route' => route('admin.recipes.store'),
                'method' => 'POST',
                'buttonText' => 'Create'
            ])

        </div>
    </div>
</div>
@endsection
