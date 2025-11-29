@extends('layouts.app')

@if (session()->has('message'))
    @section('jscript')
        <div class="alert alert-success alert-dismissible fade show light-green" role="alert">
            {!! session('message') !!}
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
            <h2 class="m-0">Edit Tag</h2>
        </div>
    </div>


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
</div>
@endsection