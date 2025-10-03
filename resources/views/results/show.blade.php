@extends('layouts.app')

@section('header')
<header class="masthead dashboard" style="background-image: url('img/dashboard-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="site-heading">
            <h1>Result</h1>
        </div>
    </div>
</header>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Created</th> <td>{{ $test->created_at or '' }}</td>
                </tr>
                <tr>
                    <th>Result</th> <td>{{ $test->result }}/10</td>
                </tr>
            </table>
            <?php $i = 1 ?>
            @foreach($results as $result)

            <table class="table table-bordered table-striped">
                <tr class="test-option{{ $result->correct ? '-true' : '-false' }}">
                    <th style="width: 15%">Question #{{ $i }}</th>
                    <th>{{ $result->question->question }}</th>
                </tr>
                @if ($result->question->code_snippet != '')
                <tr>
                    <td>Code snippet</td>
                    <td>
                        <div class="code_snippet">{!! $result->question->code_snippet !!}</div>
                    </td>
                </tr>
                @endif
                <tr>
                    <td>Options</td>
                    <td>
                        <ul>
                            <li style="@if ($result->question->correct_option == 1) font-weight: bold; @endif @if ($result->option_id == 1) text-decoration: underline @endif">
                                {{ $result->question->option1 }}
                                @if ($result->question->correct_option == 1) <em>(correct answer)</em> @endif
                                @if ($result->option_id == 1) <em>(your answer)</em> @endif
                            </li>
                            <li style="@if ($result->question->correct_option == 2) font-weight: bold; @endif @if ($result->option_id == 2) text-decoration: underline @endif">
                                {{ $result->question->option2 }}
                                @if ($result->question->correct_option == 2) <em>(correct answer)</em> @endif
                                @if ($result->option_id == 2) <em>(your answer)</em> @endif
                            </li>
                            <li style="@if ($result->question->correct_option == 3) font-weight: bold; @endif @if ($result->option_id == 3) text-decoration: underline @endif">
                                {{ $result->question->option3 }}
                                @if ($result->question->correct_option == 3) <em>(correct answer)</em> @endif
                                @if ($result->option_id == 3) <em>(your answer)</em> @endif
                            </li>
                            <li style="@if ($result->question->correct_option == 4) font-weight: bold; @endif @if ($result->option_id == 4) text-decoration: underline @endif">
                                {{ $result->question->option4 }}
                                @if ($result->question->correct_option == 4) <em>(correct answer)</em> @endif
                                @if ($result->option_id == 4) <em>(your answer)</em> @endif
                            </li>
                        </ul>
                    </td>
                </tr>
                @if ($result->question->answer_explanation != '')
                <tr>
                    <td>Answer Explanation</td>
                    <td>
                        {!! $result->question->answer_explanation !!}
                        @if ($result->question->more_info_link != '')
                        <br>
                        <br>
                        Read more:
                        <a href="{{ $result->question->more_info_link }}" target="_blank">{{ $result->question->more_info_link }}</a>
                        @endif
                    </td>
                </tr>
                @endif
            </table>
            <?php $i++ ?>
            @endforeach
        </div>
    </div>

    <a href="{{ route('test') }}" class="btn btn-primary">Take another quiz</a>

</div>
@stop