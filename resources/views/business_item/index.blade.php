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
        <h1 class="">Items</h1>
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
    <table class="table table-bordered table-striped projects" id="datatablesSimple">
        <thead>
            <tr>
                <th width="10%">
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Description
                </th>
                <th>
                    Price
                </th>

                <th>
                    Section
                </th>

                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($businessItem as $question)
            <tr>
                <td>
                    @if(!empty($question->menu_image))
                    <img class="table-img" src="{{ URL::to('/images/' . $question->menu_image)  }}" title="{{ $question->title }}" alt="{{ $question->title }}">
                    @endif
                </td>
                <td>
                    {{ $question->title }}
                </td>
                <td>
                    {{ $question->description }}
                </td>

                <td>
                    {{ $question->price }}
                </td>

                <td>
                    {{ (!empty($question->section_id)?$menuSectionArr[$question->section_id]:"")  }}
                </td>


                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('business_item.show', $question->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('business_item.edit', $question->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form id="delete-post{{ $question->id }}" style="display:inline-block" class="deletion-form" action="{{ route('business_item.destroy', $question->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm show-alert" data-id="{{ $question->id }}">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $businessItem->links() }}
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