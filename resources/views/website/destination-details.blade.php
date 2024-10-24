@php 
    $sliderOptions = [
        'dots' => false,
        'infinite' => false,
        'autoplay' => false,
        'arrows' => false,
        'centerMode' => false,
        'centerPadding' => '0px',
        'autoplaySpeed' => 3000,
        'slidesToShow' => 3,
        'slidesToScroll' => 3,
        'responsive' => [
            ['breakpoint' => 1024, 'settings' => ['slidesToShow' => 2, 'slidesToScroll' => 2]],
            ['breakpoint' => 768, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
            ['breakpoint' => 480, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
        ]
    ];

@endphp

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <style>
        .slick-prev, .slick-next {
            display: none !important;
         }
    </style>
@endpush

<x-website-layout>
    @section('title', 'Tour Guide - Homepage')
    <div class="mx-auto">
        <div class="row px-5">
            <div class="col-md-12 _about_me pe-4">
              
                <div class="_about_me_text">
                    <h3 class="font-2 display-20 color-blue py-2"> {{ $destination->name }} </h3>
                    <p class="font-4 display-16 color-black">
                        {{ $destination->district?->name }}
                    </p>
                </div>
              
                <div class="_about_me_text">
                    <div class="row my-4 _gallery">
                        @isset($destination->gallery)
                            @forelse ($destination->gallery as $index => $gallery)
                                <div class="{{ $loop->first ? 'col-lg-6 col-md-12 my-md-3 _item' : 'col-lg-3 col-md-12 my-md-3 _item' }}">
                                    <img src="{{ $gallery->image }}" alt="check-mark" class="w-100 h-100 " />
                                </div>
                            @empty
                                <p class="font-4 display-16 color-red">
                                    No gallery found.
                                </p>
                            @endforelse
                        @endisset
                    </div>
                </div>

                
                {!! $destination->description !!}

                {{-- <div class="highlights py-3">
                    <h3 class="font-2 display-20 color-blue py-2"> Highlights </h3>
                    <p class="font-4 display-16 color-black">
                        <ul class="icon-list">
                            <li class="py-2">  
                                <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3" />
                                Lorem Ipsum is simply dummy text of the  </li>
                            <li class="py-2">  
                                <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3"/>
                                Lorem Ipsum is simply dummy text of the  </li>
                            <li class="py-2">  
                                <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark"  class="me-3"/>
                                Lorem Ipsum is simply dummy text of the  </li>
                            <li class="py-2">  
                                <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3"/>
                                Lorem Ipsum is simply dummy text of the  </li>
                            <li class="py-2">  
                                <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3"/>
                                Lorem Ipsum is simply dummy text of the  </li>
                            <li class="py-2">  
                                <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3"/>
                                Lorem Ipsum is simply dummy text of the  </li>
                        </ul>
                    </p>
                </div>

                <div class="_about_me_text py-3">
                    <h3 class="font-2 display-20 color-blue py-2"> Descriptions </h3>
                    <p class="font-4 display-16 color-black">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry,  
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </p>
                </div>

                <div class="_about_me_text py-3">
                    <h3 class="font-2 display-20 color-blue py-2"> What's Included </h3>
                    <ul class="icon-list">
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3" />
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark"  class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/check-mark.svg') }}" alt="check-mark" class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                    </ul>

                </div>

                <div class="_about_me_text py-3">
                    <h3 class="font-2 display-20 color-blue py-2"> What's Excluded </h3>
                   <ul  class="icon-list">
                    <li class="py-2">  
                        <img src="{{ asset('assets/images/icons/error.svg') }}" alt="error" class="me-3" />
                        Lorem Ipsum is simply dummy text of the  </li>
                    <li class="py-2">  
                        <img src="{{ asset('assets/images/icons/error.svg') }}" alt="error" class="me-3"/>
                        Lorem Ipsum is simply dummy text of the  </li>
                    <li class="py-2">  
                        <img src="{{ asset('assets/images/icons/error.svg') }}" alt="error"  class="me-3"/>
                        Lorem Ipsum is simply dummy text of the  </li>
                    <li class="py-2">  
                        <img src="{{ asset('assets/images/icons/error.svg') }}" alt="error" class="me-3"/>
                        Lorem Ipsum is simply dummy text of the  </li>
                    <li class="py-2">  
                        <img src="{{ asset('assets/images/icons/error.svg') }}" alt="error" class="me-3"/>
                        Lorem Ipsum is simply dummy text of the  </li>
                    <li class="py-2">  
                        <img src="{{ asset('assets/images/icons/error.svg') }}" alt="error" class="me-3"/>
                        Lorem Ipsum is simply dummy text of the  </li>
                    </ul>
                </div>

                <div class="_about_me_text py-3">
                    <h3 class="font-2 display-20 color-blue py-2"> Know before you go. </h3>
                    <ul  class="icon-list">
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/exclamation.svg') }}" alt="exclamation" class="me-3" />
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/exclamation.svg') }}" alt="exclamation" class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/exclamation.svg') }}" alt="exclamation"  class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/exclamation.svg') }}" alt="exclamation" class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/exclamation.svg') }}" alt="exclamation" class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                        <li class="py-2">  
                            <img src="{{ asset('assets/images/icons/exclamation.svg') }}" alt="cexclamation" class="me-3"/>
                            Lorem Ipsum is simply dummy text of the  </li>
                    </ul>
                </div> --}}
            
                <div class="row pt-3">
                    <x-tour-guide.top-destination-list :data="$places" :options="$sliderOptions" class="w-auto" />
                </div>
          
            </div>
            {{-- <div class="col-md-3">
                <div class="_sidebar p-4">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="profile-rounded">
                            <img src="{{ asset('assets/images/tour-guide/mohammad-rounded.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                            <h3 class="font-2 display-20"> Mohammed Othman </h3>
                            <div class="reviews d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right" class="me-3"/>
                                <p class="fotn-4 display-12 m-0"> 5.0 / 5  <span class="color-blue"> (2 reviews) </span> </p>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="wrapper">
                         <div>
                            <select name="type_of_places" class="w-full p-2 rounded-md border border-gray-300">
                                <option value="" class="font-5 displaty-14 color-blue">Type of Places</option>
                                <option value="beach" class="font-5 displaty-14 color-blue">Beach</option>
                                <option value="mountain" class="font-5 displaty-14 color-blue">Mountain</option>
                                <option value="city" class="font-5 displaty-14 color-blue">City</option>
                            </select>
                        </div>
                        <div class="my-3">
                            <input type="date" name="start_date" required class="w-full p-2 rounded-md border border-gray-300">
                        </div>
                        <div>
                            <select name="type_of_places" class="w-full p-2 rounded-md border border-gray-300">
                                <option value="" class="font-5 displaty-14 color-blue">Adults</option>
                                <option value="beach" class="font-5 displaty-14 color-blue">1</option>
                                <option value="mountain" class="font-5 displaty-14 color-blue">2</option>
                                <option value="city" class="font-5 displaty-14 color-blue">3</option>
                                <option value="city" class="font-5 displaty-14 color-blue">4</option>
                                <option value="city" class="font-5 displaty-14 color-blue">5</option>
                            </select>
                        </div>
                        <hr />
                        <div class="notification d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/tour-guide/notification.svg') }}" alt="mohammad" class="me-3"/>
                            <span class="color-red font-3 display-16"> September: Only 13 slots left! </span>
                        </div>
                        <button class="btn btn-lg bg-blue color-white w-100 my-2 font-2 display-16"> Book  Now </button>
                    </div>
                    <hr/>                    
                    <div class="wrapper d-flex justify-content-start align-items-center py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/menu/destinations.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                           <h4 class=" font-2 display-16"> Available Areas </h4>
                           <p class="font-4 display-16"> Dubai (Living) , Hatta  </p> 
                        </div>
                    </div>
                    <hr/>
                    <div class="wrapper d-flex justify-content-start align-items-center py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/icons/language.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                           <h4 class=" font-2 display-16"> Languages </h4>
                           <p class="font-4 display-16"> English , arabic (Native)  </p> 
                        </div>
                    </div>
                    <hr/>
                    <div class="wrapper d-flex justify-content-start align-items-center  py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/response-time.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                           <h4 class=" font-2 display-16"> Response Time  </h4>
                           <p class="font-4 display-16"> 7 Hours on average  </p> 
                        </div>
                    </div>
                    <hr/>

                    <div class="wrapper d-flex justify-content-start align-items-center  py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/calendar.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                           <h4 class=" font-2 display-16">Availability Updated </h4>
                           <p class="font-4 display-16">  - </p> 
                        </div>
                    </div>
                </div>
            </div> --}}
        </div> 
    </div>
</x-website-layout>
