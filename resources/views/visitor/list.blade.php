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

@section('breadcrumb')
<div class="col-sm-6">
    <h1 class="h3 mb-4 text-gray-800">Visitor</h1>
</div>
@endsection

@section('search')
<form class="form-inline" method="GET">
    <div class="form-group mb-2">
        <input type="text" class="form-control" id="filter" name="filter" placeholder="Search name..." value="{{$filter}}">
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
            <table class="table table-bordered table-striped projects">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            User Info
                        </th>
                        <th>
                            Business
                        </th>
                        <th>
                            Created
                        </th>
                        <th>
                            Status
                        </th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitors as $user)

                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>

                        <td>
                            {{ $user->name }} <br> <strong> {{ $user->email }} </strong>
                        </td>

                        <td>
                            @if(!empty($user->business))
                                @foreach($user->business as $_business)
                                    {{ $_business->title }} - {{ $_business->theme }}
                                    
                                    <hr>
                                    @if(!empty($_business->rooms))
                                        @foreach( $_business->rooms as $_room )
                                        <a href="{{ route('qr',base64_encode($_room->id . '--' . $_business->id) ) }}" class="badge bg-secondary" target="_BLANK">
                                            {{ $_room->id }}
                                        </a>
                                        @endforeach
                                    @endif

                                @endforeach
                            @endif
                        </td>

                        <td>
                            {{ date('d M Y', strtotime($user->created_at)) }}
                        </td>

                        <td>
                            {{ ($user->status == 3)?"Pending":(($user->status == 1)?"Active":$user->status) }}
                            <b>{{ $user->verification_code }}</b>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user->id) }}">
                                <i class="fas fa-eye">
                                </i>
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form id="delete-user{{ $user->id }}" style="display:inline-block" class="deletion-form" action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm show-alert" data-id="{{ $user->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $visitors->links() }}

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
                    $(`#delete-user${id}`).submit();
                }
            })
        });
    });
</script>
@endsection