<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title d-flex align-items-center">
            <i class="fas fa-comment-alt me-2"></i> Feedback Summary
        </h5>

        <h3 class="mt-3">Today: {{ $todayFeedbacks }} / Total: {{ $totalFeedbacks }}</h3>

        <div class="mt-3 p-3 bg-light text-dark rounded">
            @foreach([
                ['label' => '😊 Positive', 'value' => $positiveFeedbacks, 'color' => 'success'],
                ['label' => '😐 Neutral', 'value' => $neutralFeedbacks, 'color' => 'warning'],
                ['label' => '☹️ Negative', 'value' => $negativeFeedbacks, 'color' => 'danger']
            ] as $feedback)
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span>{{ $feedback['label'] }}</span>
                <strong class="text-{{ $feedback['color'] }}">{{ $feedback['value'] }}</strong>
            </div>
            <div class="progress mb-3">
                <div class="progress-bar bg-{{ $feedback['color'] }}" 
                    role="progressbar"
                    style="width: {{ $totalFeedbacks > 0 ? ($feedback['value'] / $totalFeedbacks) * 100 : 0 }}%;">
                </div>
            </div>

            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('business.feedbacks') }}" class="btn btn-primary w-100">
                <i class="fas fa-eye me-2"></i> View Feedbacks
            </a>
        </div>
    </div>
</div>
