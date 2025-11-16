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

@section('breadcrumb')
<div class="col-sm-6">
    <h1 class="h3 mb-4 text-gray-800">Users</h1>
</div>
<div class="col-sm-6">
    <a class="btn btn-success float-sm-right" href="{{ route('posts.create') }}">
        Create User
    </a>
</div><!-- /.col -->
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
 <!-- Role Filter -->
<form class="form-inline mb-3" method="GET">
    <select name="role" class="form-control mr-2" onchange="this.form.submit()">
        <option value="">All Roles</option>
        <option value="1" {{ request('role') == 1 ? 'selected' : '' }}>Admin</option>
        <option value="2" {{ request('role') == 2 ? 'selected' : '' }}>Customer</option>
        <option value="3" {{ request('role') == 3 ? 'selected' : '' }}>Business</option>
    </select>

    <select name="status" class="form-control mr-2" onchange="this.form.submit()">
        <option value="">All Statuses</option>
        <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Active</option>
        <option value="3" {{ request('status') == 3 ? 'selected' : '' }}>Pending</option>
    </select>

    
    <input type="text" class="form-control mr-2" name="filter" placeholder="Search name..." value="{{ $filter }}">
    <button class="btn btn-primary">Apply</button>
</form>


<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped projects">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th>

                        <th>
                            ID
                        </th>
                        <th>
                            User Info
                        </th>
                        <th>
                            Role
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
                    @foreach ($users as $user)

                    <tr>
                        <td><input type="checkbox" name="user_ids[]" value="{{ $user->id }}"></td>

                        <td>
                            {{ $user->id }}
                        </td>

                        <td>
                            {{ $user->name }} <br> <strong><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></strong>

                        </td>
                        <td>
                            {{ $user->role }}
                                <br>
                            {{ $user->role == 1 ? 'Admin' : ($user->role == 2 ? 'Customer' : 'Business') }}
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
                            @if($user->status == 1)
                                <span class="badge badge-success">Active</span>
                            @elseif($user->status == 3)
                                <span class="badge badge-warning">Pending</span>
                            @else
                                <span class="badge badge-secondary">{{ $user->status }}</span>
                            @endif
                            
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

            {{ $users->links() }}

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
        $('#checkAll').on('click', function() {
            $('input[name="user_ids[]"]').prop('checked', this.checked);
        });


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