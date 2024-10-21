@extends('layouts.app')

@section('meta')

    {{-- @php echo $metatags @endphp

    @php echo $schema @endphp --}}


    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
        <style>

        .swiper-horizontal>.swiper-pagination-bullets,

        .swiper-pagination-bullets.swiper-pagination-horizontal,

        .swiper-pagination-custom,

        .swiper-pagination-fraction {

            bottom: -50px !important;

            top: var(--swiper-pagination-top, auto);

            left: 0;

            width: 100%;

        }

        .black{
            background-color: #323335;
        }
        .black:hover{
            background-color: black;
            
        }
        .swiper {

            overflow: visible !important;

        }



        .swiper-pagination-bullet {

            height: 15px !important;

            width: 15px !important;

            background: antiquewhite !important;

        }



        .swiper-pagination-bullet-active {

            background: #FFDA0F !important;

        }



        .cb-layout,

        .text-white {

            color: #fff !important;

        }



        .cb-cursor {

            color: #fff;

        }



        .cb-btn_menu-box {

            color: #fff !important;

        }



        .cb-btn_menu-box:hover {

            color: #000 !important;

        }



        .security-text {

            font-size: 65px !important;

        }



        .security-text2 {

            font-size: 150px !important;

        }



        .py-80 {

            padding: 60px 0 !important;

        }



        .cb-checkbox_rounded-box {

            background-color: #000 !important;

            color: #fff !important;

        }



        .cb-checkbox_rounded-ripple {

            border: 1px solid #fff !important;

        }



        .cb-input_light-line {

            background-image: url(https://www.allsafeeg.com/resources/assets/front/download\ \(1\).svg) !important;

        }



        .cb-checkbox_rounded label>input:checked~.cb-checkbox_rounded-box .cb-checkbox_rounded-title {

            color: #000 !important;

        }



        svg:not(:root) {

            color: #000 !important;

        }
        .cb-cursor-text{
            color: #000 !important;
            /* background-color:#000 !important; */
        }


        .cb-input_light input,

        .cb-input_light textarea {

            color: #fff !important;

        }



        .cb-outro-social-item-title span:before {

            color: #000 !important;

        }



        .cb-outro-social-item-title span:after {

            color: #000 !important;

        }



        section {

            background-color: #000 !important;

            color: #fff !important;

        }



        .cb-outro {

            padding-top: 100px !important;

            background: #fff !important;

            color: #000 !important;

        }



        .cb-screenshot-preview img,

        .cb-screenshot-preview video {

            object-fit: unset !important;

        }



        .cb-navbar-logo a img {

            width: 150px !important;

        }



        .cb-outro-address,

        .cb-outro-link:lang(ru) {

            color: #000 !important;

        }



        @media (max-width:1475px) {

            .security-text {

                font-size: 60px;

            }

        }



        @media (max-width:1388px) {

            .security-text {

                font-size: 55px;

            }

        }



        @media (max-width:1243px) {

            .security-text {

                font-size: 50px;

            }

        }



        @media (max-width:1099px) {

            .security-text {

                font-size: 45px;

            }

        }



        @media (max-width:840px) {

            .security-text {

                font-size: 40px;

            }



            .cb-tophead {

                min-height: 24vh !important;

                /* min-height: 290px !important */

            }

        }



        @media (min-width: 768px) {

            .cb-description-text.fix-w {

                max-width: 100% !important;

                margin: 55px 0 0 0;

                font-size: 22px;

                line-height: 150%

            }



            .cb-tophead-title.-lg {

                font-size: 56px !important;

            }

        }



        @media (max-width:630px) {

            .security-text {

                font-size: 30px;

            }

        }



        @media (max-width:487px) {

            .security-text {

                font-size: 25px;

            }

        }

    </style>

    <link rel="stylesheet" href="/resources/assets/security/css/output.css">

@endsection

@section('controller')



    <div class="cb-view" data-controller="projectController" id="view-main"><canvas class="cb-scene"></canvas>

    @endsection



    @section('content')

        <div class="bg-black" style="overflow-x: hidden" role="main">
            @if (app()->getLocale() == 'ar')
            {{--  herosection  --}}
                <header class="cb-tophead overflow-hidden">
                    <div class="cb-tophead-content">
                        <div class="cb-tophead-container relative">

                            <div class="flex flex-nowrap items-center">

                                <div class="w-full lg:w-2/3 my-2 px-2">

                                    <div class="cb-tophead-title -lg">

                                        <h1 class="text-[56px]">
                                            {!! $herosection->title_ar !!}
                                        </h1>

                                    </div>

                                    <p class="text-[#D7D7D7] leading-9 mt-3 text-base md:text-[18px] lg:text-[24px]">
                                        {!! $herosection->descrption_ar !!}
                                    </p>

                                    <button
                                        data-aos="fade-up"
                                        class="border border-[#940227] text-white bg-transparent mt-6 hover:text-white hover:bg-[#940227] duration-200 px-7 py-4 rounded-lg">TALK

                                        WITH US</button>

                                </div>

                                <img src="{{ asset($herosection->image) }}"

                                    class="hidden lg:block absolute z-[-1] top-1/2 -translate-y-1/2 bottom-0 right-0"

                                    alt="vector">

                                <img src="/resources/assets/security/assets/Rectangle 21.png"

                                    class="hidden lg:block absolute z-[-1] top-1/2 -translate-y-1/2 w-full left-0"

                                    alt="vector">

                            </div>

                        </div>

                    </div>

                </header>
                {{--  paertenersection  --}}
                <section class="py-10 relative">
                    <img src="/resources/assets/security/assets/Vector.png" class="right-0 top-1/2 z-[-1] absolute" alt="vector">

                    <div class="container mx-auto">

                        <div class="text-center">

                            <p class="text-[18px] font-light">
                                {{  $partenerSection->title_ar}}
                            </p>

                        </div>

                        <div class="flex flex-wrap mt-7 items-center justify-center">
                            @foreach ($partenerSectionimage as $imageitem)
                                <div class="text-center my-2 w-1/2 md:w-1/3 lg:w-1/6">
                                    <img class="mx-auto" src="{{asset($imageitem->image)}}" alt="">
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-10">

                            <p class="text-base md:text-[18px] lg:text-[24px] leading-9">
                                {!! $partenerSection->descrption_ar !!}
                            </p>

                        </div>

                        <div class="mt-10 py-6 rounded-lg bg-gradient-to-r from-[#3C0215] via-[#940227] to-[#3C0215]">

                            <div class="flex flex-wrap items-center justify-center">
                                @foreach ($numbers as $numberstatically)
                                    <div class="w-full my-2 sm:w-1/2 lg:w-1/3 text-white text-center">
                                        <p class="" data-speed="1000" class="text-[70px] font-bold">{{ $numberstatically->descrption_en }}</p>
                                        <p class="">{{ $numberstatically->title_ar }}</p>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </section>
                {{--  feature  --}}
                {{--  <section class="py-16">

                    <div class="container mx-auto">

                        <div class="flex flex-wrap">

                            <div class="hidden  w-full lg:block lg:w-2/5">

                                <img src="/resources/assets/security/assets/image 1.png" class="w-full rounded-lg" alt="security">

                            </div>

                            <div class="w-full lg:ps-16 lg:w-3/5">

                                <div>

                                    <p class="text-[#A50000] text-[21px]">FEATURE POINT</p>

                                    <h2 class="font-semibold text-[40px] md:text-[60px] mt-5">Key Service Features

                                        Protecting You</h2>

                                    <p class="leading-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum

                                        congue metus quis accumsan euismod. Maecenas sed est mollis, convallis nisi

                                        convallis, imperdiet massa. </p>

                                    <div class="flex mt-8 flex-wrap items-center lg:sticky top-0">

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="bg-gradient-to-r from-[#171717] via-[#323335] to-[#171717] rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Customize.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">Customized <br /> Security

                                                    Solutions</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="bg-gradient-to-r from-[#171717] via-[#323335] to-[#171717] rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Threat.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">Vulnerability Assessment</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="bg-gradient-to-r from-[#171717] via-[#323335] to-[#171717] rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/24 Hours Service.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">24/7 Incident <br> Response</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="bg-gradient-to-r from-[#171717] via-[#323335] to-[#171717] rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Training.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">User Training <br> Programs</h3>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>  --}}

                @foreach($feature as $key => $featureitem)
                    <section class="py-16 relative">
                        <img src="/resources/assets/security/assets/Vector2.png" class="absolute top-0 z-[-1]" alt="vecotr">

                        <div class="container mx-auto">

                            <div class="flex flex-wrap">

                                <div class="w-full lg:pe-16 lg:w-3/5">

                                    <div>

                                        <p class="text-[#A50000] text-[21px]">FEATURE POINT</p>

                                        <h2 class="font-semibold text-[40px] md:text-[60px] mt-5">{{$featureitem->title_ar  }}</h2>

                                        <p class="leading-7">
                                            {!! $featureitem->descrption_ar !!}
                                        </p>
                                        @php
                                            $moredetails = App\feature::where('security_id', $featureitem->id)->get()
                                        @endphp
                                        @if ($moredetails)
                                            <div class="flex mt-8 flex-wrap items-center lg:sticky top-0">
                                                @foreach ($moredetails as $featuredetails)
                                                    <div class="w-full px-4 my-4 md:w-1/2">
                                                        <div
                                                            class="black border-transparent hover:border-white border duration-200 rounded-lg p-8">
                                                            <img src="{{ asset($featuredetails->icon) }}" alt="vector">
                                                            <h3 class="text-[28px] line-clamp-2 font-semibold mt-3">
                                                                {{ $featuredetails->title_ar}}
                                                            </h3>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                    </div>

                                </div>

                                <div class="hidden  w-full lg:block lg:w-2/5">

                                    <img src="{{ asset($featureitem->image) }}" class="w-full rounded-lg" alt="security">

                                </div>

                            </div>

                        </div>

                    </section>
                @endforeach

                {{--  <section class="py-16 relative">

                    <img src="/resources/assets/security/assets/Vector.png" class="absolute right-0 top-0 z-[-1]" alt="vector">

                    <div class="container mx-auto">

                        <div class="flex flex-wrap">

                            <div class="hidden  w-full lg:block lg:w-2/5">

                                <img src="/resources/assets/security/assets/image 3.png" class="w-full rounded-lg" alt="security">

                            </div>

                            <div class="w-full lg:ps-16 lg:w-3/5">

                                <div>

                                    <p class="text-[#A50000] text-[21px]">FEATURE POINT</p>

                                    <h2 class="font-semibold text-[40px] md:text-[60px] mt-5">Defensive Security</h2>

                                    <p class="leading-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum

                                        congue metus quis accumsan euismod. Maecenas sed est mollis, convallis nisi

                                        convallis, imperdiet massa. </p>

                                    <div class="flex mt-8 flex-wrap items-center lg:sticky top-0">

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="black duration-200 rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Customize.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">Customized <br /> Security

                                                    Solutions</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="black duration-200 rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Threat.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">Vulnerability Assessment</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="black duration-200 rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/24 Hours Service.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">24/7 Incident <br> Response</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="black duration-200 rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Training.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">User Training <br> Programs</h3>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>  --}}

                <section class="py-16">

                    <div class="mx-auto">

                        <div class="text-center">

                            <p class="text-[#A50000] text-[21px]">

                                OUR GOALS

                            </p>

                            <h3 class="text-[40px] md:text-[50px] lg:text-[67px] font-bold">
                                {{ $goaltitle->title_ar }}
                            </h3>

                        </div>

                        <div data-cursor-text="اسحب" class="swiper mt-20 mySwiper">

                            <div class="swiper-wrapper">
                                @foreach ($goals as $goalitem)
                                    <div class="swiper-slide">

                                        <div class=" p-8  rounded-lg black duration-200 border border-transparent hover:border-white">

                                            <h3 class="text-[28px] font-bold">{{ $goalitem->title_ar }}</h3>

                                            <p class="leading-6 whitespace-normal line-clamp-1">
                                                {!! $goalitem->descrption_ar !!}
                                            </p>

                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-pagination"></div>

                        </div>

                    </div>

                </section>

                <section class="py-16">

                    <div class="container mx-auto">

                        @foreach($last as $key => $lastitem)
                            <div class="py-5">

                                <h3 class="text-[#FFDA0F] font-bold py-8 text-[22px]">{{ $lastitem->title_ar }}</h3>

                                <p class="text-[14px] leading-7">
                                    {!! $lastitem->descrption_ar !!}
                                </p>


                            </div>
                        @endforeach

                    </div>

                </section>

            @else
                {{--  hero section  --}}
                <header class="cb-tophead overflow-hidden">

                    <div class="cb-tophead-content">

                        <div class="cb-tophead-container relative">

                            <div class="flex flex-nowrap items-center">

                                <div class="w-full lg:w-2/3 my-2 px-2">

                                    <div class="cb-tophead-title -lg">

                                        <h1 class="text-[56px]">
                                            {!! $herosection->title_en !!}
                                        </h1>

                                    </div>

                                    <p class="text-[#D7D7D7] leading-9 mt-3 text-base md:text-[18px] lg:text-[24px]">
                                        {!! $herosection->descrption_en !!}

                                    </p>

                                    <button
                                        
                                        class="border border-[#940227] text-white bg-transparent mt-6 hover:text-white hover:bg-[#940227] duration-200 px-7 py-4 rounded-lg">TALK

                                        WITH US</button>

                                </div>

                                <img src="{{ asset($herosection->image) }}"

                                    class="hidden lg:block absolute z-[-1] top-1/2 -translate-y-1/2 bottom-0 right-0"

                                    alt="vector">

                                <img src="/resources/assets/security/assets/Rectangle 21.png"

                                    class="hidden lg:block absolute z-[-1] top-1/2 -translate-y-1/2 w-full left-0"

                                    alt="vector">

                            </div>

                        </div>

                    </div>

                </header>
                {{--  partener section  --}}
                <section class="py-10 relative">

                    <img src="/resources/assets/security/assets/Vector.png" class="right-0 top-1/2 z-[-1] absolute" alt="vector">

                    <div class="container mx-auto">

                        <div class="text-center">

                            <p class="text-[18px] font-light">
                                {{ $partenerSection->title_en }}
                            </p>

                        </div>

                        <div class="flex flex-wrap mt-7 items-center justify-center">
                            @foreach ($partenerSectionimage as $imageitem)
                                <div class="text-center my-2 w-1/2 md:w-1/3 lg:w-1/6">
                                    <img class="mx-auto" src="{{asset($imageitem->image)}}" alt="">
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-10">

                            <p class="text-base md:text-[18px] lg:text-[24px] leading-9">
                                {!! $partenerSection->descrption_en !!}
                            </p>

                        </div>

                        <div class="mt-10 py-6 rounded-lg bg-gradient-to-r from-[#3C0215] via-[#940227] to-[#3C0215]">

                            <div class="flex flex-wrap items-center justify-center">
                                @foreach ($numbers as $numberstatically)
                                    <div class="w-full my-2 sm:w-1/2 lg:w-1/3 text-white text-center">
                                        <p class="text-[70px] font-bold">{{ $numberstatically->descrption_en }}</p>
                                        <p class="">{{ $numberstatically->title_en }}</p>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </section>
                {{--  feature section  --}}
                {{--  <section class="py-16">

                    <div class="container mx-auto">

                        <div class="flex flex-wrap">

                            <div class="hidden  w-full lg:block lg:w-2/5">

                                <img src="/resources/assets/security/assets/image 1.png" class="w-full rounded-lg" alt="security">

                            </div>

                            <div class="w-full lg:ps-16 lg:w-3/5">

                                <div>

                                    <p class="text-[#A50000] text-[21px]">FEATURE POINT</p>

                                    <h2 class="font-semibold text-[40px] md:text-[60px] mt-5">Key Service Features

                                        Protecting You</h2>

                                    <p class="leading-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum

                                        congue metus quis accumsan euismod. Maecenas sed est mollis, convallis nisi

                                        convallis, imperdiet massa. </p>

                                    <div class="flex mt-8 flex-wrap items-center lg:sticky top-0">

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="black duration-200 rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Customize.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">Customized <br /> Security

                                                    Solutions</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="black duration-200 rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Threat.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">Vulnerability Assessment</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="black duration-200 rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/24 Hours Service.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">24/7 Incident <br> Response</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="black duration-200 rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Training.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">User Training <br> Programs</h3>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>  --}}
                @foreach($feature as $key => $featureitem)
                    <section class="py-16 relative">
                        <img src="/resources/assets/security/assets/Vector2.png" class="absolute top-0 z-[-1]" alt="vecotr">

                        <div class="container mx-auto">

                            <div class="flex flex-wrap">

                                <div class="w-full lg:pe-16 lg:w-3/5">

                                    <div>

                                        <p class="text-[#A50000] text-[21px]">FEATURE POINT</p>

                                        <h2 class="font-semibold text-[40px] md:text-[60px] mt-5">{{$featureitem->title_en  }}</h2>

                                        <p class="leading-7">
                                            {!! $featureitem->descrption_en !!}
                                        </p>

                                        @php
                                            $moredetails = App\feature::where('security_id', $featureitem->id)->get()
                                        @endphp
                                        @if ($moredetails)
                                            <div class="flex mt-8 flex-wrap items-center lg:sticky top-0">
                                                @foreach ($moredetails as $featuredetails)
                                                    <div class="w-full px-4 my-4 md:w-1/2">
                                                        <div
                                                            class="black border-transparent hover:border-white border duration-200 rounded-lg p-8">
                                                            <img src="{{ asset($featuredetails->icon) }}" alt="vector">
                                                            <h3 class="text-[28px] line-clamp-2 font-semibold mt-3">
                                                                {{ $featuredetails->title_en}}
                                                            </h3>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                    </div>

                                </div>

                                <div class="hidden  w-full lg:block lg:w-2/5">

                                    <img src="{{ asset($featureitem->image) }}" class="w-full rounded-lg" alt="security">

                                </div>

                            </div>

                        </div>

                    </section>
                @endforeach

                {{--  <section class="py-16 relative">

                    <img src="/resources/assets/security/assets/Vector.png" class="absolute right-0 top-0 z-[-1]" alt="vector">

                    <div class="container mx-auto">

                        <div class="flex flex-wrap">

                            <div class="hidden  w-full lg:block lg:w-2/5">

                                <img src="/resources/assets/security/assets/image 3.png" class="w-full rounded-lg" alt="security">

                            </div>

                            <div class="w-full lg:ps-16 lg:w-3/5">

                                <div>

                                    <p class="text-[#A50000] text-[21px]">FEATURE POINT</p>

                                    <h2 class="font-semibold text-[40px] md:text-[60px] mt-5">Defensive Security</h2>

                                    <p class="leading-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum

                                        congue metus quis accumsan euismod. Maecenas sed est mollis, convallis nisi

                                        convallis, imperdiet massa. </p>

                                    <div class="flex mt-8 flex-wrap items-center lg:sticky top-0">

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="bg-gradient-to-r from-[#171717] via-[#323335] to-[#171717] rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Customize.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">Customized <br /> Security

                                                    Solutions</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="bg-gradient-to-r from-[#171717] via-[#323335] to-[#171717] rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Threat.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">Vulnerability Assessment</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="bg-gradient-to-r from-[#171717] via-[#323335] to-[#171717] rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/24 Hours Service.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">24/7 Incident <br> Response</h3>

                                            </div>

                                        </div>

                                        <div class="w-full px-4 my-4 md:w-1/2">

                                            <div

                                                class="bg-gradient-to-r from-[#171717] via-[#323335] to-[#171717] rounded-lg p-8">

                                                <img src="/resources/assets/security/assets/Training.png" alt="vector">

                                                <h3 class="text-[28px] font-semibold mt-3">User Training <br> Programs</h3>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>  --}}

                <section class="py-16">

                    <div class="mx-auto">

                        <div class="text-center">

                            <p class="text-[#A50000] text-[21px]">

                                OUR GOALS

                            </p>

                            <h3 class="text-[40px] md:text-[50px] lg:text-[67px] font-bold">
                                {{ $goaltitle->title_en }}
                            </h3>

                        </div>

                        <div data-cursor-text="Drag" class="swiper mt-20 mySwiper">

                            <div class="swiper-wrapper">
                                @foreach ($goals as $goalitem)
                                    <div class="swiper-slide">

                                        <div class=" p-8 rounded-lg black duration-200 border border-transparent hover:border-white">

                                            <h3 class="text-[28px] font-bold">{{ $goalitem->title_en }}</h3>

                                            <p class="leading-6 whitespace-normal">
                                                {!! $goalitem->descrption_en !!}
                                            </p>

                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-pagination"></div>

                        </div>

                    </div>

                </section>

                <section class="py-16">

                    <div class="container mx-auto">
                        @foreach($last as $key => $lastitem)
                            <div class="py-5">

                                <h3 class="text-[#FFDA0F] font-bold py-8 text-[22px]">{{ $lastitem->title_en }}</h3>

                                <p class="text-[14px] leading-7">
                                    {!! $lastitem->descrption_en !!}
                                </p>

                            </div>
                        @endforeach


                    </div>

                </section>
            @endif
        </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
        (() => {
    const counter = document.querySelectorAll('.counter');
    // covert to array
    const array = Array.from(counter);
    // select array element
    array.map((item) => {
        // data layer
        let counterInnerText = item.textContent;

        let count = 1;
        let speed = item.dataset.speed / counterInnerText
        function counterUp() {
            item.textContent = count++
            if (counterInnerText < count) {
                clearInterval(stop);
            }
        }
        const stop = setInterval(() => {
            counterUp();
        }, speed);
    })
})()

      AOS.init();

    </script>
    @endsection
