<header class="biz-header py-2">
    <div class="container px-2">
        <div class="me-4 ms-4 mt-4">
            <img src="{{ asset('images/') }}/{{ $pgBusiness->logo }}" alt="{{ $pgBusiness->title }}" title="{{ $pgBusiness->title }}" class="mb-3 menu-logo px-5">
            <h1 class="display-5 fw-bold mb-2">{{ $pgBusiness->title }}</h1>
            <span class="mb-2">{{ $pgBusiness->description }}</span>
            @if(!empty($pgBusiness->contact) && $pgBusiness->contact != "-")
            <div class="address">Contact: {{ $pgBusiness->contact }}</div>
            @endif
            @if(!empty($pgBusiness->address) && $pgBusiness->address != "-")
            <div class="address">{{ $pgBusiness->address }}</div>
            @endif
        </div>
    </div>
</header>