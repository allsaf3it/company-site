<nav class="theme-nav-transitioning nav-mobile-not-active theme-nav-dark theme-nav-transitioning">
    <div class="nav-links">
        <div class="nav-links-wrapper">
            <a href="{{LaravelLocalization::localizeUrl('/')}}" class="logo" data-hover="logo">
            <img src="{{asset('uploads/configration/'. $configration->app_logo)}}" class="logo-img" alt="Logo">
            </a>
            <ul class="ul-desktop">
                @foreach($menus as $menu)
                    @if($menu->type == 'home')
                        <li class="btn btn-link @if(Request::segment(2) == '') active @endif" data-barba-update>
                            <a href="{{LaravelLocalization::localizeUrl('/')}}" class="btn-click">
                                <div class="btn-fill btn-original-fill"></div>
                                <div class="btn-text btn-original-text">
                                    <span>{{$menu->{'name_'.$lang} }}</span>
                                </div>
                                <div class="btn-fill btn-duplicate-fill"></div>
                                <div class="btn-text btn-duplicate-text">
                                    <span>{{$menu->{'name_'.$lang} }}</span>
                                </div>
                            </a>
                        </li>
                    @else
                        <li class="btn btn-link @if(Request::segment(2) == $menu->type) active @endif" data-barba-update>
                            <a href="{{LaravelLocalization::localizeUrl('/' . $menu->type)}}" class="btn-click">
                                <div class="btn-fill btn-original-fill"></div>
                                <div class="btn-text btn-original-text">
                                    <span>{{$menu->{'name_'.$lang} }}</span>
                                </div>
                                <div class="btn-fill btn-duplicate-fill"></div>
                                <div class="btn-text btn-duplicate-text">
                                    <span>{{$menu->{'name_'.$lang} }}</span>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="wrap-right-corner">
            <div class="btn btn-normal btn-contact" data-barba-update>
                <a href="{{LaravelLocalization::localizeUrl('/contact')}}" class="btn-click">
                    <div class="btn-fill btn-original-fill"></div>
                    <div class="btn-text btn-original-text">
                        <span>
                        <div class="extra-layer">{{trans('home.contact')}}</div>
                        </span>
                    </div>
                    <div class="btn-fill btn-duplicate-fill"></div>
                    <div class="btn-text btn-duplicate-text">
                        <span>
                        <div class="extra-layer">{{trans('home.contact')}}</div>
                        </span>
                    </div>
                </a>
            </div>
            <div class="hamburger-wrap">
                <div class="hamburger" data-toggle="modal-nav-mobile">
                    <div class="hamburger-bar"></div>
                    <div class="hamburger-bar"></div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="modal-nav-mobile">
        <div class="modal-block">
            <div class="modal-block-background"></div>
            <ul class="ul-mobile">
            <span class="modal-small-title">{{trans('home.menu')}}</span>


                @foreach($menus as $menu)
                    @if($menu->type == 'home')
                        <li class="@if(Request::segment(2) == '') active @endif" data-barba-update>
                            <a href="{{LaravelLocalization::localizeUrl('/')}}">
                                <span>{{$menu->{'name_'.$lang} }}</span>
                            </a>
                        </li>
                    @else
                        <li class="@if(Request::segment(2) == $menu->type) active @endif" data-barba-update>
                            <a href="{{LaravelLocalization::localizeUrl('/' . $menu->type)}}">
                                <span>{{$menu->{'name_'.$lang} }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="modal-nav-background" data-close="modal"></div>
</nav>