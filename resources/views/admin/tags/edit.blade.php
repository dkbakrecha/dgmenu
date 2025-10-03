@extends('layouts.admin')

@if (session()->has('message'))
    @section('alerts')
        <div class="alert alert-success alert-dismissible fade show light-green" role="alert">
            {!! session('message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endsection
@endif

@section('breadcrumb')
    <div class="col-sm-6">
        <h2 class="m-0">Edit Tag</h2>
    </div><!-- /.col -->  
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('tags.update', $tag->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tag name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $tag->name }}">
                            </div>
                           

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
               
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection