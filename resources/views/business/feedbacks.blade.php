@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Feedbacks for {{ $business->title }}</h2>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Feedback</th>
                <th>Mood</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $index => $feedback)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ ($feedback->user_info)?$feedback->user_info['full_name'] : 'Guest' }}</td>
                <td>{{ $feedback->feedback }}</td>
                <td>
                    @if($feedback->mood == 'happy')
                        😊
                    @elseif($feedback->mood == 'average')
                        😐
                    @else
                        😞
                    @endif
                </td>
                <td>{{ $feedback->created_at->format('d M Y, h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
