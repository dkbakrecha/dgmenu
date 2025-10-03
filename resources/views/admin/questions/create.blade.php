@extends('layouts/admin')

@section('breadcrumb')
<div class="col-sm-6">
    <h2 class="m-0">Question</h2>
</div><!-- /.col -->
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <form method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">


                        <div>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select id="category" name="category_id" class="form-control custom-select" required>
                                                <option selected disabled>Select one</option>
                                                @foreach ($categoriesParents as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="subcategory">Sub Category:</label>
                                            <select name="sub_category_id" id="subcategory" class="form-control custom-select" disabled>
                                                <option value="">Select a category first</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="question">Question</label>
                                            <input type="text" name="question" id="question" class="form-control" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50px">A</td>
                                    <td><input type="text" name="option1" id="option1" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td><input type="text" name="option2" id="option2" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td><input type="text" name="option3" id="option3" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td><input type="text" name="option4" id="option4" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="correct_option">Correct Option</label>
                                            <select id="correct_option" name="correct_option" class="form-control custom-select">
                                                <option disabled>Select one</option>
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                                <option value="4">D</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
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
    var cookie_cate_id;
    var cookie_subCate_id;

    $(document).ready(function() {
        $('#body').summernote();

        cookie_cate_id = getCookie("cate_id");
        if(cookie_cate_id != ""){
            $('#category').val(cookie_cate_id).change();;
        }
    });

    $('#category').on('change', function() {
        var categoryId = $(this).val();

        if (categoryId) {
            setCookie("cate_id", categoryId, 10);

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

                    cookie_subCate_id = getCookie("sub_cate_id");
                    if(cookie_subCate_id != ""){
                        $('#subcategory').val(cookie_subCate_id).change();;
                    }

                }
            });
        } else {
            $('#subcategory').prop('disabled', true);
            $('#subcategory').empty();
            $('#subcategory').append('<option value="">Select a category first</option>');
        }
    });
    
    $('#subcategory').on('change', function() {
        var subCategoryId = $(this).val();
        setCookie("sub_cate_id", subCategoryId, 10);
    });
</script>
@endsection