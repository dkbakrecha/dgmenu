<div class="card shadow-sm p-4">
    <div class="card-body">
        <h5 class="card-title text-primary d-flex align-items-center mb-3">
            <i class="fas fa-user me-2"></i> Profile Information
        </h5>

        <div class="d-flex align-items-center mb-2">
            <i class="fas fa-user-circle text-secondary me-2"></i>
            <strong class="me-2">Full Name:</strong>
            <span class="text-muted">{{ auth()->user()->name }}</span>
        </div>

        <div class="d-flex align-items-center mb-2">
            <i class="fas fa-user-circle text-secondary me-2"></i>
            <strong class="me-2">Phone:</strong>
            <span class="text-muted">{{ auth()->user()->phone }}</span>
        </div>

        <div class="d-flex align-items-center mb-3">
            <i class="fas fa-envelope text-secondary me-2"></i>
            <strong class="me-2">Email:</strong>
            <span class="text-muted">{{ auth()->user()->email }}</span>
            <button class="btn btn-sm btn-outline-primary ms-2" onclick="copyToClipboard('{{ auth()->user()->email }}')">
                <i class="fas fa-copy"></i>
            </button>
        </div>

        <div class="btn-group w-100 hide" role="group">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <i class="fas fa-user-edit me-2"></i> Edit Profile
            </a>
            <a href="password.change" class="btn btn-outline-danger">
                <i class="fas fa-key me-2"></i> Change Password
            </a>
            <a href="logout" class="btn btn-outline-dark"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </div>
    </div>
</div>
