<section class="py-2 mnu-page">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4">
                @foreach($pgMenuSections as $section)
                <div class="mb-5 menu_section p-2" id="Section{{ $section->id }}">
                    <h3 class="sec-heading mb-2 text-uppercase">{{ $section->section_title }}</h3>
                    @foreach($section->items as $item)
                    <div class="mnu-item w-100 mb-2 row">
                        <div class="mnu-detail col-12">
                            <h4>
                                <span class="menu-title">{{ $item->title }}</span>
                                <span class="menu-price float-end">&#8377; {{ $item->price }}</span>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>