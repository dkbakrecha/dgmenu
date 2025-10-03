@extends('layouts/admin')

@section('breadcrumb')
    <div class="col-sm-6">
        <h2 class="m-0">Add Article</h2>
    </div><!-- /.col -->  
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" name="featured" for="exampleCheck1">Featured Post</label>
                            </div>
                            <div class="form-group">
                                <label for="title">Post Title </label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Post Excerpt</label>
                                <textarea id="short_description" required name="short_description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Post Description</label>
                                <textarea id="body" required name="content" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="file" name="cover_image" class="form-control-file" id="image">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_type">Article Type</label>
                                <select id="post_type" name="post_type" class="form-control custom-select">
                                    <option disabled>Select one</option>
                                    <option value="1">Notes</option>
                                    <option value="2">Blog</option>
                                    <option value="3">Exam Notification</option>
                                </select>
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
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
    $('#body').summernote();
    });
</script>
@endsection