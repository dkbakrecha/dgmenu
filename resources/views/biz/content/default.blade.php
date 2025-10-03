
<section class="py-2 border-bottom mnu-page">
    <div class="container">
        <div class="row gx-5">

            <div class="col-lg-4">
                @foreach($pgMenuSections as $section)
                <div class="mb-2 menu_section mt-2 p-3" id="Section{{ $section->id }}">
                    <h3 class="mb-5 text-center text-uppercase">{{ $section->section_title }}</h3>

                    @foreach($section->items as $item)
                    <div class="mnu-item w-100 mb-4 row">
                        

                        <div class="item-img col-2 mt-4">
                            @if(!empty($item->menu_image))
                            <img src="{{ URL::to('/images/' . $item->menu_image)  }}" title="{{ $item->title }}" alt="{{ $item->title }}">
                            @else
                            <img src="{{ URL::to('/img/blank.png')  }}" title="{{ $item->title }}" alt="{{ $item->title }}">
                            @endif

                        </div>
                        <div class="mnu-detail col-7">
                            <h3>
                                <span class="menu-title">{{ $item->title }}</span>
                                <span class="menu-dots"></span>
                            </h3>
                            <div class="menu-desc">
                                {{ $item->description }}
                            </div>
                        </div>
                        <div class="col-3 menu-price mt-4 text-right">&#8377; {{ $item->price }}</div>
                    </div>
                    @endforeach
                </div>


                @endforeach
            </div>

        </div>
    </div>
</section>