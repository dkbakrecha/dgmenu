@extends('layouts.dashboard')
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
        <h1 class="">Business Listing</h1>
        <a href="{{ route('business_listing.create') }}" class="btn btn-success pull-right">Add Listing</a>
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
                <th colspan="2">
                    Business Name
                </th>
                <th>
                    Social
                </th>

                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($businessListing as $question)
            <tr>
                <td>
                    @foreach($question->images as $image)
                            <div class="card" style="width: 40px;">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Business Image">
                    
                            </div>
                        
                    @endforeach
                </td>

                <td>
                    {{ $question->business_name }}
                </td>

                <td>
                    @if(!empty($question->instagram_page))
                    <a href="https://instagram.com/{{ $question->instagram_page }}" target="_BLANK">Instagram</a>
                    
                    @endif
                    @if(!empty($question->facebook_page))
                    <a href="{{ $question->facebook_page }}" target="_BLANK">Facebook</a>
                    
                    @endif
                    @if(!empty($question->website))
                    <a href="{{ $question->website }}" target="_BLANK">Web</a>
                    
                    @endif
                </td>



                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('biz', $question->id) }}" target="_BLANK">
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('business_listing.edit', $question->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form id="delete-post{{ $question->id }}" style="display:none" class="deletion-form" action="{{ route('business_item.destroy', $question->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm show-alert" data-id="{{ $question->id }}">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </form>

                    <button class="btn btn-secondary btn-sm toggle-status" data-id="{{ $question->id }}" data-status="{{ $question->status }}">
                        @if($question->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $businessListing->links() }}
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

        $(document).on('click', '.toggle-status', function() {
            var button = $(this);
            var id = button.data('id');
            var currentStatus = button.data('status');
            alert("SDf");
            $.ajax({
                url: '{{ route("business_listing.toggle_status", ":id") }}'.replace(':id', id),
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: currentStatus ? 0 : 1
                },
                success: function(response) {
                    if (response.success) {
                        button.data('status', currentStatus ? 0 : 1);
                        button.html(currentStatus ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>');
                    } else {
                        alert('Something went wrong. Please try again.');
                    }
                }
            });
        });
    });


</script>
@endsection