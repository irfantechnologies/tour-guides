<div class="_wrapper px-5">
    <div class="heading-buttons pt-5 d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> Tour guide </h2>
            <p class="font-4 display-16 color-blue"> Find trusted tour guides awarded for their Excellent performance </p>
        </div>
        <div class="_slide_buttons">
            <button class="slick-prev-custom" data-slider="slider-1">
                <img src="{{ asset('/public/assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4" data-slider="slider-1">
                <img src="{{ asset('/public/assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div>
    </div>

    <x-website.slider :options="$options">
        <div class="slick-slider mt-4" id="slider-2">
            @forelse($data as $slide)
                <div class="slide">
                    <div class="extra-slide-content">
                        <div class="row _tour_guide">
                            <div class="col-md-5 pe-0 image position-relative">
                                <img src="assets/images/homepage/man-4.png" alt="tour guide" width="100%" />
                                <p class="_price font-4 display-12 color-white" style="background-image: url({{ asset('/public/assets/images/homepage/price-background.svg') }})">
                                    50 AED <br/> per hour 
                                </p>
                            </div>
                            <div class="_tour_content col-md-7 border-top border-end border-bottom rounded-end d-flex justify-content-center align-items-center flex-column">
                                <div class="detail pt-2">
                                    <h3 class="font-2 display-20 color-blue">Mohammed Othman</h3>
                                    <p class="font-4 display-14 color-black py-3">Emirate: Abu Dhabi</p>
                                    <p class="font-4 display-14 color-black">Experience: 14 years</p>
                                    <p class="font-4 display-14 color-black py-3">Languages: Arabic, Urdu, +3 Languages</p>
                                </div>
                                <div class="row w-100 border-top ml-2 py-2">
                                    <div class="col-md-6 text-center border-end">
                                        <p class="font-4 display-14 color-blue">Reviews</p>
                                        <p class="font-4 display-14 color-secondary pt-2">7</p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p class="font-4 display-14 color-blue">Reviews</p>
                                        <img src="{{ asset('/public/assets/images/icons/stars.svg') }}" alt="Arrow right" class="text-cetner mx-auto pt-2" />
                                    </div>
                                </div>
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