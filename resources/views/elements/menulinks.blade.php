<div class="nav">
    @if(Auth::check())
    <a href="{{ route('board') }}" class="nav-link">Dashboard</a>
    @endif
</div>
 @if(Auth::check())
        @php
            $unreadCount = 0;
        @endphp

        <a class="nav-link position-relative hide" href="{{ route('notifications') }}" aria-label="Notifications">
            <span class="material-icons fs-4">notifications</span>
            @if($unreadCount > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $unreadCount }}
                </span>
            @endif
        </a>



    <!-- Profile Dropdown (Visible at All Times) -->
    <div class="dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center " href="#" 
            id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if(Auth::user()->profile_image)
                <img src="{{ Auth::user()->profile_image }}" 
                        alt="Profile Image" 
                        class="rounded-circle me-2" 
                        width="35" height="35">
            @else
                <div class="profile-circle text-white me-2">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            @endif

            <div class="d-flex flex-column">
                <strong>{{ Auth::user()->name }}</strong>
                <small class="text-muted">{{ Auth::user()->role == 2 ? 'User' : 'Restaurant' }}</small>
            </div>
        </a>

        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item hide" href="{{ route('profile.view') }}">Profile</a></li>
            <li><a class="dropdown-item hide" href="{{ route('profile.edit') }}">Edit Profile</a></li>
            <li><a class="dropdown-item hide" href="{{ route('settings') }}">Settings</a></li>
            @if(!empty($business->id))
            <li><a class="dropdown-item" href="{{ route('business.edit', $business->id) }}"><span class="material-symbols-outlined pe-2">storefront</span> Update Business</a></li>
            @endif
            <li><a class="dropdown-item" href="{{ route('themes') }}"><span class="material-symbols-outlined pe-2">qr_code</span>Theme</a></li>

            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item text-danger" href="{{ route('sign-out') }}">
                    <span class="material-symbols-outlined pe-2">logout</span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
@else
    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}" title="About us">About us</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" title="Log In">Login</a></li>

    <!-- Get Started Button -->
    <a class="btn btn-primary text-light d-flex align-items-center gap-2 px-3 py-2" href="{{ route('register-user') }}">
        <span class="material-symbols-outlined">add_business</span> 
        Get Started
    </a>
 @endif