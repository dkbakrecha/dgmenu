<div class="card shadow-sm p-4">
    <div class="card-body">
        <h5 class="card-title text-primary d-flex align-items-center mb-3">
            <i class="fas fa-briefcase me-2"></i> Business Overview
        </h5>

        <div class="mb-3">
            <p class="mb-1"><strong><i class="fas fa-building me-2"></i> Business Name:</strong> 
                <span class="text-muted">{{ $business->title }}</span>
            </p>

            <p class="mb-1"><strong><i class="fas fa-phone me-2"></i> Phone:</strong> 
                <span class="text-muted">{{ $business->contact }}</span>
                <button class="btn btn-sm btn-outline-primary ms-2" onclick="copyToClipboard('{{ $business->contact }}')">
                    <i class="fas fa-copy"></i>
                </button>
            </p>

            <p class="mb-1"><strong><i class="fas fa-envelope me-2"></i> Email:</strong> 
                <span class="text-muted">{{ $business->email_address }}</span>
                <button class="btn btn-sm btn-outline-primary ms-2" onclick="copyToClipboard('{{ $business->email_address }}')">
                    <i class="fas fa-copy"></i>
                </button>
            </p>
        </div>

        <div class="btn-group w-100 hide" role="group">
            <a href="{{ route('business.edit', $business->id) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i> Edit Profile
            </a>

            <a href="" class="btn btn-outline-success" target="_blank">
                <i class="fas fa-globe me-2"></i> View Profile
            </a>

            <a href="" class="btn btn-outline-warning">
                <i class="fas fa-comment-dots me-2"></i> Feedback
            </a>
        </div>
    </div>
</div>
