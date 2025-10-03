@extends('layouts.admin')
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

@section('breadcrumb')
    <div class="col-sm-6">
        <h2 class="m-0">Edit Question</h2>
    </div><!-- /.col -->  
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('questions.update', $question->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" name="question" id="question" class="form-control" value="{{ $question->question }}" required>
                            </div>
                            
                            <div >
                                <table>
                                    <tr>
                                        <td width="50px">A</td>
                                        <td><input type="text" name="option1" id="option1" class="form-control" value="{{ $question->option1 }}" required></td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td><input type="text" name="option2" id="option2" class="form-control" value="{{ $question->option2 }}" required></td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td><input type="text" name="option3" id="option3" class="form-control" value="{{ $question->option3 }}" required></td>
                                    </tr>
                                    <tr>
                                        <td>D</td>
                                        <td><input type="text" name="option4" id="option4" class="form-control" value="{{ $question->option4 }}" required></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="form-group">
                                <label for="correct_option">Correct Option</label>
                                <select id="correct_option" name="correct_option" class="form-control custom-select">
                                    <option disabled>Select one</option>
                                    <option value="1" {{ ($question->correct_option == 1)?"Selected":"" }} >A</option>
                                    <option value="2" {{ ($question->correct_option == 2)?"Selected":"" }} >B</option>
                                    <option value="3" {{ ($question->correct_option == 3)?"Selected":"" }} >C</option>
                                    <option value="4" {{ ($question->correct_option == 4)?"Selected":"" }} >D</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category_id" class="form-control custom-select" required>
                                    <option selected disabled>Select a category</option>
                                    @foreach ($categoriesParents as $category)
                                        <option value="{{ $category->id }}" {{ ($question->category_id == $category->id)?"Selected":"" }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            

                        <label for="subcategory">Sub Category:</label>
                        <select name="sub_category_id" id="subcategory" class="form-control custom-select" disabled>
                            <option value="">Select a category first</option>
                        </select>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
               
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>{{ $question }}
                    <input type="submit" value="Save Changes" class="btn btn-success float-right">
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

        var categoryId = $("#category").val();
        
        if (categoryId) {
            $('#subcategory').prop('disabled', false);
            $.ajax({
                url: "{{ route('subcategories', '') }}" + "/" + categoryId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#subcategory').empty();
                    $.each(response, function(key, value) {
                        $('#subcategory').append('<option value="' + value.id + '">' + value.title + '</option>');
                    });

                    $('#subcategory').val("{{ $question->sub_category_id }}");
                }
            });
        } else {
            $('#subcategory').prop('disabled', true);
            $('#subcategory').empty();
            $('#subcategory').append('<option value="">Select a category first</option>');
        }
    });

  
    $('#category').on('change', function() {
        var categoryId = $(this).val();
        
        if (categoryId) {
            $('#subcategory').prop('disabled', false);
            $.ajax({
                url: "{{ route('subcategories', '') }}" + "/" + categoryId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#subcategory').empty();
                    $.each(response, function(key, value) {
                        $('#subcategory').append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                }
            });
        } else {
            $('#subcategory').prop('disabled', true);
            $('#subcategory').empty();
            $('#subcategory').append('<option value="">Select a category first</option>');
        }
    });
</script>
@endsection