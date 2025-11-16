@extends('layouts/app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Recipe</h2>

        <div>
            <a href="{{ route('recipes.index') }}" class="btn btn-secondary" target="_blank">
                View Recipe List
            </a>

            @if(isset($recipe))
            <a href="{{ url('/recipes/'.$recipe->slug) }}" class="btn btn-info" target="_blank">
                View Recipe
            </a>
            @endif
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">

            @include('admin.recipes._form', [
                'route' => route('recipes.update', $recipe->id),
                'method' => 'PUT',
                'buttonText' => 'Update',
                'recipe' => $recipe
            ])

        </div>
    </div>
</div>

<style>
.fab-container {
    position: fixed;
    bottom: 25px;
    right: 25px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.fab-btn {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    background: #0d6efd;
    color: #fff;
    border: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
}

.fab-btn.secondary {
    background: #6c757d;
}
.fab-btn.info {
    background: #0dcaf0;
}
</style>

<div class="fab-container">

    <!-- Back to List -->
    <a href="{{ route('recipes.index') }}" target="_blank" class="fab-btn secondary" title="Recipe List">
        <i class="bi bi-list"></i>
    </a>

    @if(isset($recipe))
    <!-- View Recipe (Only on edit page) -->
    <a href="{{ url('/recipe/'.$recipe->slug) }}" target="_blank" class="fab-btn info" title="View Recipe">
        <i class="bi bi-eye"></i>
    </a>
    @endif

    <!-- Save Form -->
    <button onclick="document.getElementById('recipeForm').submit();" class="fab-btn" title="Save Recipe">
        <i class="bi bi-save"></i>
    </button>
</div>

@endsection
