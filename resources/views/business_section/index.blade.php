@extends('layouts.app')
@if (session()->has('addPostSuccess'))
@section('alerts')
<div class="alert alert-success alert-dismissible fade show light-green" role="alert">
    {!! session('addPostSuccess') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endsection
@endif

@section('header')
<div class="dashboard-heading pb-1 pt-4">
    <div class="container-fluid px-4">
        <h1 class="">Sections</h1>

    </div>
</div>
@endsection

@section('search')
<form class="form-inline" method="GET">
    <div class="form-group mb-2">
        <input type="text" class="form-control" id="filter" name="filter" placeholder="Search title..." value="{{$filter}}">
    </div>
    <button type="submit" class="btn btn-default mb-2">Filter</button>
</form>
@endsection

@section('content')
<!-- Main content -->
<div class="container-fluid px-4">
    <a class="btn btn-primary float-end" href="{{ route('menu_section.create') }}">
        <span class="material-symbols-outlined">
            library_add
        </span>
        New
    </a>

    <table class="table table-bordered table-striped projects" id="datatablesSimple">
        <thead>
            <tr>
                <th>
                    Title
                </th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menuItem as $section)
            <tr>
                <td>
                    {{ $section->section_title }}
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('business_item.show', $section->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('business_item.edit', $section->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form id="delete-post{{ $section->id }}" style="display:inline-block" class="deletion-form" action="{{ route('business_item.destroy', $section->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm show-alert" data-id="{{ $section->id }}">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $menuItem->links() }}
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        // show alert before deleting post
        $('.show-alert').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-post${id}`).submit();
                }
            })
        });
    });
</script>
@endsection