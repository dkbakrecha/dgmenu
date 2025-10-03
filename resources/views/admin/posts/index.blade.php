@extends('layouts.admin')
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

@section('breadcrumb')
<div class="col-sm-6">
    <h1 class="h3 mb-4 text-gray-800">Posts</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <a class="btn btn-success float-sm-right" href="{{ route('posts.create') }}">
        Create new Post
    </a>
</div><!-- /.col -->
@endsection

@section('search')
<form class="form-inline" method="GET">
        <div class="form-group mb-2">
            <label for="filter" class="col-sm-2 col-form-label">Filter</label>
            <input type="text" class="form-control" id="filter" name="filter" placeholder="Search title..." value="{{$filter}}">
        </div>
        <button type="submit" class="btn btn-default mb-2">Filter</button>
    </form>
@endsection

@section('content')
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
                            TYPE
                        </th>
                        <th style="width: 60%">
                            Post title
                        </th>
                        <th style="width: 29%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            {{ $post->id }}
                        </td>
                        <td>
                            <a>
                                {{ $post_type[$post->post_type] }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $post->title }}
                            </a>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.view', $post->title_slug) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->title_slug) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form id="delete-post{{ $post->id }}" style="display:inline-block" class="deletion-form" action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm show-alert" data-id="{{ $post->id }}">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $posts->links() }}

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
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