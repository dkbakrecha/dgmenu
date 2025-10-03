<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Mood Distribution Chart
    const ctx = document.getElementById('moodChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Positive', 'Neutral', 'Negative'],
            datasets: [{
                data: [{{ $positiveFeedbacks }}, {{ $neutralFeedbacks }}, {{ $negativeFeedbacks }}],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545']
            }]
        }
    });

    // Feedback Trend Chart
    const trendCtx = document.getElementById('feedbackTrendChart').getContext('2d');
    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: @json($feedbackTrends->pluck('date')),
            datasets: [{
                label: 'Feedback Volume',
                data: @json($feedbackTrends->pluck('count')),
                borderColor: '#007bff',
                fill: false
            }]
        }
    });
</script>
