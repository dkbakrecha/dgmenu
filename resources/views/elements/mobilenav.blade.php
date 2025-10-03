        <!-- Bottom Navigation Menu -->
        <nav class="navbar bottom-nav hide">
        <ul class="nav nav-pills nav-justified w-100">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('homepage') }}">
                    <i class="material-icons">home</i>
                    <span class="label">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('resturents') }}">
                    <i class="material-icons">restaurant</i>
                    <span class="label">Restaurants</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="material-icons">local_offer</i>
                    <span class="label">Offers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="material-icons">account_circle</i>
                    <span class="label">Profile</span>
                </a>
            </li>
        </ul>
    </nav>