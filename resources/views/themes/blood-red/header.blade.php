<header class="biz-header py-5">
    <div class="container px-5">
        <div class="row gx-5">
            <div class="col-lg-4">
                <div class="mt-3">
                    <img src="{{ asset('images/') }}/{{ $pgBusiness->logo }}" alt="{{ $pgBusiness->title }}" title="{{ $pgBusiness->title }}" class="mb-3 menu-logo">
            

                    <h1 class="display-4 mb-2 heading">{{ $pgBusiness->title }}</h1>
                    <span class="mb-2">{{ $pgBusiness->description }}</span>
                    <div class="address">{{ $pgBusiness->address }}</div>
                </div>
            </div>
        </div>
    </div>
</header>