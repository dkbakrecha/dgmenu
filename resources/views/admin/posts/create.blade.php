@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h2 class="m-0">Add Article</h2>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="title_slug">Slug (Auto-generated from Title)</label>
                                <input type="text" name="title_slug" id="title_slug" class="form-control" placeholder="Auto-generated" readonly>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea id="short_description" name="short_description" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="body">Content</label>
                                <textarea id="body" name="content" class="form-control" rows="10" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="post_type">Post Type</label>
                                <select id="post_type" name="post_type" class="form-control custom-select">
                                    <option value="2" selected>Blog</option>
                                    <option value="1">Notes</option>
                                    <option value="3">Exam Notification</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Thumb Image</label>
                                <input type="file" name="cover_image" class="form-control-file" id="image">
                            </div>
                            
                            <div class="form-check mt-3">
                                <input type="checkbox" class="form-check-input" id="featured" name="featured">
                                <label class="form-check-label" for="featured">Featured Post</label>
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
                    <input type="submit" value="Create" class="btn btn-success float-right">
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