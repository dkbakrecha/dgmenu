<div class="card shadow-sm p-4">
    <div class="card-body">
        <h5 class="card-title text-primary d-flex align-items-center mb-3">
            <i class="fas fa-chart-pie me-2"></i> Overview Summary
        </h5>

        <div class="row text-center">
            @foreach([
                ['icon' => 'fas fa-th-large', 'title' => 'Sections', 'value' => $sectionCount, 'color' => 'info'],
                ['icon' => 'fas fa-box', 'title' => 'Items', 'value' => $itemCount, 'color' => 'success'],
                ['icon' => 'fas fa-qrcode', 'title' => 'QR', 'value' => $roomCount, 'color' => 'warning'],
                ['icon' => 'fas fa-signal', 'title' => 'Scans', 'value' => '0', 'color' => 'danger']
            ] as $stat)
            <div class="col-md-3">
                <div class="p-3 bg-light rounded hover-effect">
                    <i class="{{ $stat['icon'] }} fa-2x text-{{ $stat['color'] }} mb-2"></i>
                    <div class="h5">{{ $stat['title'] }}</div>
                    <p class="text-muted mb-0">{{ $stat['value'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
