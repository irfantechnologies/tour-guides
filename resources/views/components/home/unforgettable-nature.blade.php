<div class="_wrapper py-5 px-5 bg-gray _unforgettable_slider _dotted_nav_slider">  
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> Unforgettable nature experiences in uae </h2>
        </div>
        <div class="_slide_buttons">
            <button class="slick-prev-custom"  data-slider="slider-2">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4"  data-slider="slider-2">
                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div>
    </div>
    @php 
        $options['slidesToShow'] = 4; 
    @endphp
    <x-website.slider :options="$options">
        <div class="slick-slider mt-4" id="slider-2">
            @forelse($data as $slide)
                <div class="slide">
                    <div class="extra-slide-content">
                        <div class="row p-4 card border-0">
                            <div class="_details pb-4">
                                <img src="{{ $slide['image'] }}" alt="ETGA Logo" width="100%"/>
                                <p class="pt-4 font-4 display-16 color-blue"> {{ $slide['content'] }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty 
                <p>No Data Found!</p>
            @endforelse
        </div>
    </x-website.slider>   
</div>