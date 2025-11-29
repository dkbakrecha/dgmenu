@extends('layouts.app')


@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="h3 mb-0 text-gray-800">Tags</h1>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success float-end" href="{{ route('tags.create') }}">
                Create new Tag
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <form class="form-inline d-flex gap-2" method="GET">
                <div class="form-group mb-0 flex-grow-1">
                    <input type="text" class="form-control w-100" id="filter" name="filter" placeholder="Search title..." value="{{$filter}}">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>


<!-- Main content -->
<section class="content">
    

    <!-- Default box -->
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 10%">
                            Name
                        </th>
                        <th style="width: 29%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->id }}
                        </td>
                        <td>
                            <a>
                                {{ $tag->name }}
                            </a>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('tags.edit', $tag->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form id="delete-tag{{ $tag->id }}" style="display:inline-block" class="deletion-form" action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm show-alert" data-id="{{ $tag->id }}">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $tags->links() }}

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection

@section('jscript')
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