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

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="h3 mb-0 text-gray-800">Questions</h1>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success float-end" href="{{ route('questions.create') }}">
                Create new Question
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
            <table class="table table-bordered table-striped projects">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            A
                        </th>
                        <th>
                            B
                        </th>
                        <th>
                            C
                        </th>
                        <th>
                            D
                        </th>
                        <th>
                            Ans
                        </th>
                        <th>
                            Category
                        </th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                    <tr>
                        <td>
                            {{ $question->id }}
                        </td>
                        <td>
                            {{ $question->question }}
                        </td>
                        <td>
                            {{ $question->option1 }}
                        </td>
                        <td>
                            {{ $question->option2 }}
                        </td>
                        <td>
                            {{ $question->option3 }}
                        </td>
                        <td>
                            {{ $question->option4 }}
                        </td>
                        <td>
                            @if($question->correct_option == 1)         
                                <b>A</b>    
                            @elseif($question->correct_option == 2)         
                                <b>B</b>    
                            @elseif($question->correct_option == 3)         
                                <b>C</b>    
                            @else
                                <b>D</b>    
                            @endif
                        </td>
                        <td>
                            {{ $categoriesArr[$question->category_id] }} > 
                            {{ $categoriesArr[$question->sub_category_id] }}
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('questions.show', $question->id) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('questions.edit', $question->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form id="delete-post{{ $question->id }}" style="display:inline-block" class="deletion-form" action="{{ route('questions.destroy', $question->id) }}" method="post">
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

            {{ $questions->links() }}

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