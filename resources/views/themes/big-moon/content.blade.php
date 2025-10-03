<section class="mnu-page">
    @foreach($pgMenuSections as $section)
    <div class="menu_section" id="Section{{ $section->id }}">
        <h3 class="mb-2 mt-2 p-3 sec-heading text-uppercase">{{ $section->section_title }}</h3>
        @foreach($section->items as $item)
        <div class="mnu-item w-100 mb-2 row">
            <div class="mnu-detail col-12">
                <h4>
                    <span class="ps-3 menu-title">{{ $item->title }}</span>
                    <span class="menu-price float-end">&#8377; {{ $item->price }}</span>
                </h4>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</section>