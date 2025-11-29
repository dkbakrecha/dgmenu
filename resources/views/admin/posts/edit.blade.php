@extends('layouts.app')
@if (session()->has('updatePostSuccess'))
    @section('alerts')
        <div class="alert alert-success alert-dismissible fade show light-green" role="alert">
            {!! session('updatePostSuccess') !!}
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
            <h2 class="m-0">Edit Article</h2>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('posts.update', $post->title_slug) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $post->title }}">
                            </div>

                            <div class="form-group">
                                <label for="title_slug">Slug</label>
                                <input type="text" name="title_slug" id="title_slug" class="form-control"
                                    value="{{ $post->title_slug }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="form-control custom-select">
                                    <option disabled>Select one</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="resume">Short Description</label>
                                <textarea id="resume" name="short_description" class="form-control"
                                    rows="3" required>{{ $post->short_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="body">Content</label>
                                <textarea id="body" name="body" class="form-control"
                                    rows="10" required>{{ $post->content }}</textarea>
                            </div>

                            <div class="image-preview mb-2">
                                <img src="{{ asset('images/' . $post->cover_image) }}" alt="" style="max-width: 200px;">
                            </div>
                            <div class="form-group">
                                <label for="image">Thumb Image</label>
                                <input type="file" name="cover_image" class="form-control-file" id="image">
                            </div>

                            <div class="form-group">
                                <label for="post_type">Post Type</label>
                                <select id="post_type" name="post_type" class="form-control custom-select">
                                    <option disabled>Select one</option>
                                    <option value="1" {{ $post->post_type == 1 ? 'selected' : '' }}>Notes</option>
                                    <option value="2" {{ $post->post_type == 2 ? 'selected' : '' }}>Blog</option>
                                    <option value="3" {{ $post->post_type == 3 ? 'selected' : '' }}>Exam Notification</option>
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text" id="tags" name="tags" class="form-control"
                                    placeholder="tag 1, tag 2 ...">
                            </div> --}}

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



@section('jscript')
<script type="text/javascript">
    $(document).ready(function() {
    $('#body').summernote();
    });
</script>
@endsection