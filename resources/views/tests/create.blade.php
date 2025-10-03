@extends('layouts/app')

@section('header')
<!-- Page Header-->
<header class="masthead dashboard" style="background-image: url('img/dashboard-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="site-heading">
            <h1>Quiz</h1>
        </div>
    </div>
</header>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{ route('save-test') }}" id="quizForm" enctype="multipart/form-data">
                @csrf

                <div class="panel panel-default">
                    @if(count($questions) > 0)
                    <div class="panel-body">
                        <?php $i = 1; ?>
                        @foreach($questions as $question)

                        @if ($i > 1)
                        <hr /> @endif
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <div class="form-group">
                                    <strong>Question {{ $i }}.</strong> {!! nl2br($question->question) !!}

                                    @if ($question->code_snippet != '')
                                    <div class="code_snippet">{!! $question->code_snippet !!}</div>
                                    @endif

                                    <input type="hidden" name="questions[{{ $i }}][id]" value="{{ $question->id }}">
                                    <input type="hidden" name="questions[{{ $i }}][correct]" value="{{ $question->correct_option }}">

                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="1">
                                        {{ $question->option1 }}
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="2">
                                        {{ $question->option2 }}
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="3">
                                        {{ $question->option3 }}
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="4">
                                        {{ $question->option4 }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                        @endforeach
                    </div>
                    @endif
                </div>

                <input type="submit" value="Save Changes" class="btn btn-success float-right">
            </form>
        </div>
    </div>


</div>

@stop

@section('javascript')
@parent
<script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script>
    $('.datetime').datetimepicker({
        autoclose: true,
        dateFormat: "{{ config('app.date_format_js') }}",
        timeFormat: "hh:mm:ss"
    });
</script>

@stop