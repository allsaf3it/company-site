<footer class="section theme-dark footer data-change-color-section" data-scroll-section>
    <div class="footer-overflow">
        <div class="container">
            <div class="row row-marquee">
                <div class="flex-col">
                <div class="marquee">
                    <div class="marquee-inner" data-scroll data-scroll-direction="horizontal"
                        data-scroll-speed="4">
                        <ul class="marquee-inner-wrap">
                            <li class="single-marquee-part">
                            <h3 class="big">All Safe<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.57144 10.4286V10.4286C7.77616 10.4286 12.0087 6.20471 12 1V1V1C11.9913 6.20471 16.2239 10.4286 21.4286 10.4286V10.4286"
                                        stroke="black" stroke-width="2" />
                                    <path d="M12 23V1" stroke="black" stroke-width="2" />
                                </svg>
                            </h3>
                            </li>
                            <li class="single-marquee-part">
                            <h3 class="big">Trade Safe <svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.57144 10.4286V10.4286C7.77616 10.4286 12.0087 6.20471 12 1V1V1C11.9913 6.20471 16.2239 10.4286 21.4286 10.4286V10.4286"
                                        stroke="black" stroke-width="2" />
                                    <path d="M12 23V1" stroke="black" stroke-width="2" />
                                </svg>
                            </h3>
                            </li>
                            <li class="single-marquee-part">
                            <h3 class="big">All Safe <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.57144 10.4286V10.4286C7.77616 10.4286 12.0087 6.20471 12 1V1V1C11.9913 6.20471 16.2239 10.4286 21.4286 10.4286V10.4286"
                                        stroke="black" stroke-width="2" />
                                    <path d="M12 23V1" stroke="black" stroke-width="2" />
                                </svg>
                            </h3>
                            </li>
                            <li class="single-marquee-part">
                            <h3 class="big">Trade Safe <svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.57144 10.4286V10.4286C7.77616 10.4286 12.0087 6.20471 12 1V1V1C11.9913 6.20471 16.2239 10.4286 21.4286 10.4286V10.4286"
                                        stroke="black" stroke-width="2" />
                                    <path d="M12 23V1" stroke="black" stroke-width="2" />
                                </svg>
                            </h3>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            <div class="row-wrap" data-scroll data-scroll-speed="-6" data-scroll-position="bottom"
                data-scroll-offset="-50%, 0%">
                <div class="overlay overlay-gradient" data-scroll data-scroll-speed="9"
                data-scroll-position="bottom" data-scroll-offset="-50%, 0%">
                <div class="overlay overlay-gradient-inner"></div>
                </div>
                <div class="row row-logo">
                <div class="flex-col">
                    <a href="{{LaravelLocalization::localizeUrl('/contact')}}" data-cursor-text="{{trans('home.Get in Touch')}}"
                        data-background-color="var(--color-primary)" class="logo">
                        <div class="overlay">
                            <div class="letter">
                            <img src="{{asset('uploads/configration/'. $configration->footer_logo)}}" alt="footer logo">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="flex-col mobile">
                    <div class="btn btn-negative">
                        <a href="{{LaravelLocalization::localizeUrl('/contact')}}" class="btn-click">
                            <div class="btn-fill btn-original-fill"></div>
                            <div class="btn-text btn-original-text">
                            <span>{{trans('home.Get in Touch')}}</span>
                            </div>
                            <div class="btn-fill btn-duplicate-fill"></div>
                            <div class="btn-text btn-duplicate-text">
                            <span>{{trans('home.Get in Touch')}}</span>
                            </div>
                        </a>
                    </div>
                </div>
                </div>
                <div class="row row-links">
                <div class="stripe"></div>
                <div class="flex-col">
                    @if(! empty($setting->linkedin))
                        <p><a href="{{$setting->linkedin}}" target="_blank">{{trans('home.linkedin')}}</a></p>
                    @endif
                    @if(! empty($setting->instgram))
                        <p><a href="{{$setting->instgram}}" target="_blank">{{trans('home.instgram')}}</a></p>
                    @endif
                </div>
                <div class="flex-col">
                    <p><a href="https://allsafeeg.com/" target="_blank">Design & Develop by All Safe</a></p>
                </div>
                <div class="flex-col">
                    <p>All Safe Trade © <span id="current-year"></span></p>
                </div>
                </div>
            </div>
        </div>
    </div>
</footer>
