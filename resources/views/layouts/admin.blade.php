<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(app()->getLocale() == 'ar') dir="rtl" @endif>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <!-- Favicon -->
    <link rel="icon" href="{{url('uploads/settings/source/'.$configration->fav_icon)}}" type="image/x-icon" />

    <!-- Title -->
    <title>{{trans('home.admin_panel')}}</title>

    <!---Fontawesome css-->
    <link href="{{URL::To('resources/assets/back/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <!---Ionicons css-->
    <link href="{{URL::To('resources/assets/back/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!---Typicons css-->
    <link href="{{URL::To('resources/assets/back/plugins/typicons.font/typicons.css')}}" rel="stylesheet">

    <!---Feather css-->
    <link href="{{URL::To('resources/assets/back/plugins/feather/feather.css')}}" rel="stylesheet">

    <!---Falg-icons css-->
    <link href="{{URL::To('resources/assets/back/plugins/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">

    <!---Style css-->
    @if(app()->getlocale() == 'en')
        <link href="{{URL::To('resources/assets/back/css/style.css')}}" rel="stylesheet">
        <link href="{{URL::To('resources/assets/back/css/custom-style.css')}}" rel="stylesheet">
        <link href="{{URL::To('resources/assets/back/css/skins.css')}}" rel="stylesheet">
        <link href="{{URL::To('resources/assets/back/css/dark-style.css')}}" rel="stylesheet">
        <link href="{{URL::To('resources/assets/back/css/custom-dark-style.css')}}" rel="stylesheet">
    @else
        <link href="{{URL::To('resources/assets/back/css-rtl/style.css')}}" rel="stylesheet">
        <link href="{{URL::To('resources/assets/back/css-rtl/custom-style.css')}}" rel="stylesheet">
        <link href="{{URL::To('resources/assets/back/css-rtl/skins.css')}}" rel="stylesheet">
        <link href="{{URL::To('resources/assets/back/css-rtl/dark-style.css')}}" rel="stylesheet">
        <link href="{{URL::To('resources/assets/back/css-rtl/custom-dark-style.css')}}" rel="stylesheet">
    @endif

    <!---Select2 css-->
    <link href="{{URL::To('resources/assets/back/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!---DataTables css-->
    <link href="{{URL::To('resources/assets/back/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::To('resources/assets/back/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::To('resources/assets/back/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />

    <!---Fileupload css-->
    <link href="{{ URL::To('resources/assets/back/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />

    <!---Fancy uploader css-->
    <link href="{{URL::To('resources/assets/back/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

    <!--Mutipleselect css-->
    @if(app()->getlocale() == 'en')
    <link rel="stylesheet" href="{{URL::To('resources/assets/back/plugins/multipleselect/multiple-select.css')}}">
    @else
    <link rel="stylesheet" href="{{URL::To('resources/assets/back/plugins/multipleselect/multiple-select-rtl.css')}}">
    @endif

    @if(auth()->user()->theme == 'dark')
    <link href="{{URL::To('resources/assets/back//css/custom-dark-style.css')}}" rel="stylesheet">
    @endif

    <!---Sidebar css-->
    <link href="{{URL::To('resources/assets/back/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

    <!---Jquery.mCustomScrollbar css-->
    <link href="{{URL::To('resources/assets/back/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet">

    <!---Sidemenu css-->
    @if(app()->getlocale() == 'en')
    <link href="{{URL::To('resources/assets/back/plugins/sidemenu/sidemenu.css')}}" rel="stylesheet">
    @else
    <link href="{{URL::To('resources/assets/back/plugins/sidemenu/sidemenu-rtl.css')}}" rel="stylesheet">
    @endif

    <!---Gallery css-->
    <link href="{{URL::To('resources/assets/back/plugins/gallery/gallery.css')}}" rel="stylesheet">

    @yield('style')
</head>

<body oncontextmenu="return false" @if(auth()->user()->theme == 'dark') class="dark-theme" @endif>

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{URL::To('resources/assets/back/img/loader.gif')}}" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">

        <!-- Sidemenu -->
        <div class="main-sidebar main-sidebar-sticky side-menu">
            <div class="sidemenu-logo">
                <a class="main-logo" href="{{url('admin')}}">
                    <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="logo" width="70px" height="70px">
                </a>
            </div>

            <div class="main-sidebar-body">
                <ul class="nav">

                    <li class="nav-label">{{trans('home.dashboard')}}</li>
                    
                    <li class="nav-item @if(Request::segment(2) == '') active show @endif">
                        <a class="nav-link" href="{{url('admin')}}"><i class="fe fe-airplay"></i><span class="sidemenu-label">{{trans('home.admin_index')}}</span></a>
                    </li>

                    <li class="nav-label">{{trans('home.site_content')}}</li>

                    @can(['menu','menuItem'])
                        <li class="nav-item @if(Request::segment(2) == 'menus' || Request::segment(2) == 'menu-items') active show @endif">
                            <a class="nav-link with-sub" href=""><i class="fas fa-align-justify"></i><span class="sidemenu-label">{{trans('home.menus')}}</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item @if(Request::segment(2) == 'menus') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/menus')}}">{{trans('home.menus')}}</a>
                                </li>
    
                                <li class="nav-sub-item @if(Request::segment(2) == 'menu-items') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/menu-items')}}">{{trans('home.menu_items')}}</a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    
                    @can('homeImage')
                        <li class="nav-item @if(Request::segment(2) == 'home-images') active show @endif">
                            <a class="nav-link" href="{{url('admin/home-images')}}"><i class="far fa-images"></i><span class="sidemenu-label">{{trans('home.homeImages')}}</span></a>
                        </li>
                    @endcan
                    
                    @can('galleryImage')
                        <li class="nav-item @if(Request::segment(2) == 'gallery-images') active show @endif">
                            <a class="nav-link" href="{{url('admin/gallery-images')}}"><i class="fe fe-camera"></i><span class="sidemenu-label">{{trans('home.galleryImages')}}</span></a>
                        </li>
                    @endcan

                    @can('galleryVideo')
                        <li class="nav-item @if(Request::segment(2) == 'gallery-videos') active show @endif">
                            <a class="nav-link" href="{{url('admin/gallery-videos')}}"><i class="fab fa-youtube"></i><span class="sidemenu-label">{{trans('home.galleryVideos')}}</span></a>
                        </li>
                    @endcan
                    
                    @can('galleryLetter')
                        <li class="nav-item @if(Request::segment(2) == 'news-letters') active show @endif">
                            <a class="nav-link" href="{{url('admin/news-letters')}}"><i class="far fa-newspaper"></i><span class="sidemenu-label">{{trans('home.newsLetters')}}</span></a>
                        </li>
                    @endcan
                    
                    @can('contactUs')
                        <li class="nav-item @if(Request::segment(2) == 'contact-us-messages') active show @endif">
                            <a class="nav-link" href="{{url('admin/contact-us-messages')}}">
                                <i class="fas fa-envelope-open-text"></i>
                                <span class="sidemenu-label">{{trans('home.messages')}}</span>
    
                                @if(\App\ContactUs::messageCount() > 0)
                                <span class="badge badge-secondary side-badge">{{\App\ContactUs::messageCount()}}</span>
                                @endif
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item @if(Request::segment(2) == 'careers') active show @endif">
                        <a class="nav-link" href="{{url('admin/careers')}}">
                            <i class="fas fa-pen-alt"></i>
                            <span class="sidemenu-label">{{trans('home.careers')}}</span>

                            @if(\App\Career::careersCount() > 0)
                            <span class="badge badge-secondary side-badge">{{\App\Career::careersCount()}}</span>
                            @endif
                        </a>
                    </li>

                    @can('testimonial')
                        <li class="nav-item @if(Request::segment(2) == 'testimonials') active show @endif">
                            <a class="nav-link" href="{{url('admin/testimonials')}}"><i class="fas fa-user-tie"></i><span class="sidemenu-label">{{trans('home.testimonials')}}</span></a>
                        </li>
                    @endcan
                    
                    @can(['about','aboutStruc'])
                        <li class="nav-item @if(Request::segment(2) == 'editAbout' || Request::segment(2) == 'aboutStrucs') active show @endif">
                            <a class="nav-link with-sub" href=""><i class="fas fa-low-vision"></i><span class="sidemenu-label">{{trans('home.about')}}</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item @if(Request::segment(2) == 'editAbout') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/editAbout')}}">{{trans('home.editAbout')}}</a>
                                </li>
    
                                <li class="nav-sub-item @if(Request::segment(2) == 'aboutStrucs') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/aboutStrucs')}}">{{trans('home.aboutStrucs')}}</a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    
                    @can('writers')
                        <li class="nav-item @if(Request::segment(2) == 'writers') active show @endif">
                            <a class="nav-link" href="{{url('admin/writers')}}"><i class="fas fa-th"></i><span class="sidemenu-label">{{trans('home.writers')}}</span></a>
                        </li>
                    @endcan
                    
                    @can(['blogCategory','blogItem'])
                        <li class="nav-item @if(Request::segment(2) == 'blog-categories' || Request::segment(2) == 'blog-items') active show @endif">
                            <a class="nav-link with-sub" href=""><i class="fab fa-blogger"></i><span class="sidemenu-label">{{trans('home.blog')}}</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item @if(Request::segment(2) == 'blog-categories') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/blog-categories')}}">{{trans('home.blogcategory')}}</a>
                                </li>
    
                                <li class="nav-sub-item @if(Request::segment(2) == 'blog-items') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/blog-items')}}">{{trans('home.blogitem')}}</a>
                                </li>
                            </ul>
                        </li>
                    @endcan    

                   @can('category')
                        <li class="nav-item @if(Request::segment(2) == 'categories' || Request::segment(2) == 'brands') active show @endif">
                            <a class="nav-link with-sub" href=""><i class="fas fa-th"></i><span class="sidemenu-label">{{trans('home.categories')}}</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">   
                                @can('category')
                                    <li class="nav-sub-item @if(Request::segment(2) == 'categories') active @endif">
                                        <a class="nav-sub-link" href="{{url('admin/categories')}}">{{trans('home.categories')}}</a>
                                    </li>
                                @endcan
                                
                                @can('brand')
                                    <li class="nav-sub-item @if(Request::segment(2) == 'brands') active @endif">
                                        <a class="nav-sub-link" href="{{url('admin/brands')}}">{{trans('home.brands')}}</a>
                                    </li>
                                @endcan    
                            </ul>
                        </li>
                    @endcan
                    
                    
                    @can('page')
                        <li class="nav-item @if(Request::segment(2) == 'pages') active show @endif">
                            <a class="nav-link" href="{{url('admin/pages')}}"><i class="fas fa-file"></i><span class="sidemenu-label">{{trans('home.pages')}}</span></a>
                        </li>
                    @endcan
                    
                    @can('faq')
                        <li class="nav-item @if(Request::segment(2) == 'faqs') active show @endif">
                            <a class="nav-link" href="{{url('admin/faqs')}}"><i class="fas fa-question"></i><span class="sidemenu-label">{{trans('home.faq')}}</span></a>
                        </li>
                    @endcan
                    <li class="nav-item @if(Request::segment(2) == 'jobs') active show @endif">
                        <a class="nav-link" href="{{url('admin/jobs')}}"><i class="fas fa-tasks"></i><span class="sidemenu-label">{{trans('home.jobs')}}</span></a>
                    </li>
                    
                    @can('slider')
                        <li class="nav-item @if(Request::segment(2) == 'intro-sliders' || Request::segment(2) == 'home-sliders'   || Request::segment(2) == 'offers-sliders') active show @endif">
                            <a class="nav-link with-sub" href=""><i class="fas fa-sliders-h"></i><span class="sidemenu-label">{{trans('home.sliders')}}</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                @can('introSlider')
                                <li class="nav-sub-item @if(Request::segment(2) == 'intro-sliders') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/intro-sliders')}}">{{trans('home.intro_sliders')}}</a>
                                </li>
                                @endcan
                                
                                @can('homeSlider')
                                <li class="nav-sub-item @if(Request::segment(2) == 'home-sliders') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/home-sliders')}}">{{trans('home.home_sliders')}}</a>
                                </li>
                                @endcan
                                
                                @can('offersSlider')
                                <li class="nav-sub-item @if(Request::segment(2) == 'offers-sliders') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/offers-sliders')}}">{{trans('home.offers_sliders')}}</a>
                                </li>
                                @endcan
    
                            </ul>
                        </li>
                    @endcan
                    
                    @can('service')
                        <li class="nav-item @if(Request::segment(2) == 'services') active show @endif">
                            <a class="nav-link" href="{{url('admin/services')}}"><i class="fas fa-praying-hands"></i><span class="sidemenu-label">{{trans('home.services')}}</span></a>
                        </li>
                    @endcan
                    <li class="nav-item @if(Request::segment(2) == 'courses') active show @endif">
                        <a class="nav-link" href="{{url('admin/courses')}}"><i class="fab fa-blogger"></i><span class="sidemenu-label">{{trans('home.courses')}}</span></a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'inspiros') active show @endif">
                        <a class="nav-link" href="{{url('admin/inspiros')}}"><i class="fab fa-blogger"></i><span class="sidemenu-label">{{trans('home.inspiros')}}</span></a>
                    </li>
                    
                    @can('project')
                        <li class="nav-item @if(Request::segment(2) == 'projects') active show @endif">
                            <a class="nav-link" href="{{url('admin/projects')}}"><i class="fas fa-project-diagram"></i><span class="sidemenu-label">{{trans('home.projects')}}</span></a>
                        </li>
                    @endcan
                    {{--  security  --}}
                    <li class="nav-item @if(Request::segment(2) == 'projects') active show @endif">
                            <a class="nav-link" href="{{route('securityAdmin')}}"><i class="fas fa-project-diagram"></i>
                                <span class="sidemenu-label">{{trans('home.security')}}</span>
                            </a>
                    </li>
                    <li class="nav-label">{{trans('home.hello')}}</li>
                    <li class="nav-item @if(Request::segment(2) == 'editHello') active show @endif">
                        <a class="nav-link" href="{{url('admin/editHello')}}"><i class="fas fa-low-vision"></i><span class="sidemenu-label">{{trans('home.hello')}}</span></a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'brandsreel') active show @endif">
                        <a class="nav-link" href="{{url('admin/brandsreel')}}"><i class="fas fa-copyright"></i><span class="sidemenu-label">{{trans('home.brandsreel')}}</span></a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'postcards') active show @endif">
                        <a class="nav-link" href="{{url('admin/postcards')}}"><i class="fas fa-th"></i><span class="sidemenu-label">{{trans('home.postcards')}}</span></a>
                    </li>
                    <li class="nav-item @if(Request::segment(2) == 'achievements') active show @endif">
                        <a class="nav-link" href="{{url('admin/achievements')}}"><i class="fas fa-award"></i><span class="sidemenu-label">{{trans('home.achievements')}}</span></a>
                    </li>

                    @can('setting')
                        <li class="nav-label">{{trans('home.settings')}}</li>
                        @can('users')
                        <li class="nav-item @if(Request::segment(2) == 'users' || Request::segment(2) == 'roles' || Request::segment(2) == 'permissions') active show @endif">
                            <a class="nav-link with-sub" href=""><i class="fas fa-users"></i><span class="sidemenu-label">{{trans('home.users')}}</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                @can('user')
                                    <li class="nav-sub-item @if(Request::segment(2) == 'users') active @endif">
                                        <a class="nav-sub-link" href="{{url('admin/users')}}">{{trans('home.users')}}</a>
                                    </li>
                                @endcan
                                
                                @can('role')            
                                    <li class="nav-sub-item @if(Request::segment(2) == 'roles') active @endif">
                                        <a class="nav-sub-link" href="{{url('admin/roles')}}">{{trans('home.roles')}}</a>
                                    </li>
                                @endcan
                                
                                @can('permission')
                                    <li class="nav-sub-item @if(Request::segment(2) == 'permissions') active @endif">
                                        <a class="nav-sub-link" href="{{url('admin/permissions')}}">{{trans('home.permissions')}}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
    
                        <li class="nav-item @if(Request::segment(2) == 'settings' || Request::segment(3) == 'en' || Request::segment(3) == 'ar') active show @endif">
                            <a class="nav-link with-sub" href=""><i class="fas fa-cogs"></i><span class="sidemenu-label">{{trans('home.settings_and_configrations')}}</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item @if(Request::segment(2) == 'settings') active @endif">
                                    <a class="nav-sub-link" href="{{url('admin/settings')}}">{{trans('home.settings')}}</a>
                                </li>
                                @can('configration')
                                    <li class="nav-sub-item @if(Request::segment(3) == 'en') active @endif">
                                        <a class="nav-sub-link" href="{{url('admin/configrations/en')}}">{{trans('home.configrations')}} {{trans("home.en")}}</a>
                                    </li>
        
                                    <li class="nav-sub-item @if(Request::segment(3) == 'ar') active @endif">
                                        <a class="nav-sub-link" href="{{url('admin/configrations/ar')}}">{{trans('home.configrations')}} {{trans("home.ar")}}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan


                    @can('address')
                        <li class="nav-item @if(Request::segment(2) == 'addresses') active show @endif">
                            <a class="nav-link" href="{{url('admin/addresses')}}"><i class="fas fa-map-pin"></i><span class="sidemenu-label">{{trans('home.addresses')}}</span></a>
                        </li>
                    @endcan

                    @can('seo')
                        <li class="nav-item @if(Request::segment(2) == 'seo-assistant') active show @endif">
                            <a class="nav-link" href="{{url('admin/seo-assistant')}}"><i class="fas fa-search"></i><span class="sidemenu-label">{{trans('home.seo_assistant')}}</span></a>
                        </li>
                    @endcan

                    @can('translation')
                        <li class="nav-item @if(Request::segment(2) == 'languages') active show @endif">
                            <a class="nav-link" href="{{url('languages')}}" target="_blank"><i class="fas fa-language"></i><span class="sidemenu-label">{{trans('home.site_translation')}}</span></a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
        <!-- End Sidemenu -->

        <!-- Main Content-->
        <div class="main-content side-content pt-0">

            <!-- Main Header-->
            <div class="main-header side-header sticky">
                <div class="container-fluid">
                    <div class="main-header-left">
                        <a class="main-logo d-lg-none" href="{{url('/')}}">
                            <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="logo" width="70px" height="70px">
                        </a>
                        <a class="main-header-menu-icon" href="" id="mainSidebarToggle"><span></span></a>
                    </div>

                    <div class="main-header-right">

                        <div class="arrow_box_right">
                            @if(app()->getLocale() == 'en')

                            <a href="{{ url('lang/ar') }}" class="dropdown-item py-1">
                                <img src="{{ URL::to('resources/assets/back/img/flags/eg.png') }}" alt="Arabic Flag" class="langimg" />
                            </a>
                            @else
                            <a href="{{ url('lang/en') }}" class="dropdown-item py-1">
                                <img src="{{ URL::to('resources/assets/back/img/flags/us.png') }}" alt="English Flag" class="langimg" />
                            </a>
                            @endif
                        </div>

                        <div class="dropdown d-md-flex">
                            <a class="nav-link icon full-screen-link">
                                <i class="fe fe-maximize fullscreen-button"></i>
                            </a>
                        </div>

                        <div class="dropdown main-profile-menu">
                            <a class="main-img-user" href="">
                                @if(auth()->user()->image)
                                <img alt="avatar" src="{{ URL::to('uploads/users/resize200') }}/{{ Auth::user()->image }}">
                                @else
                                <img alt="avatar" src="{{ URL::To('resources/assets/back/img/users/1.jpg')}}">
                                @endif
                            </a>
                            <div class="dropdown-menu">
                                <div class="header-navheading">
                                    <h6 class="main-notification-title">{{Auth::user()->name()}}</h6>
                                </div>

                                <a class="dropdown-item border-top" href="{{url('admin')}}">
                                    <i class="fe fe-edit"></i> {{trans('home.edit_profile')}}
                                </a>

                                <a class="dropdown-item" href="{{url('admin/switch-theme')}}">
                                    <i class="fas fa-palette"></i> {{trans('home.switch_theme')}}
                                </a>

                                <a class="dropdown-item" href="{{url('admin/settings')}}">
                                    <i class="fe fe-settings"></i> {{trans('home.settings')}}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fe fe-power"></i>{{trans('home.log_out')}}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Header-->

            <div id="loader"></div>

            @yield('content')
        </div>
        <!-- End Main Content-->

        <!-- Main Footer-->
        <!-- <div class="main-footer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span>{{trans('home.Copyright')}} © {{date('Y')}} <a href="{{url('#')}}" target="_blank">{{trans('home.allsafe')}}</a> {{trans('home.All rights reserved.')}}</span>
                    </div>
                </div>
            </div>
        </div> -->
        <!--End Footer-->

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

    <!-- Jquery js-->
    <script src="{{ URL::To('resources/assets/back/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{ URL::To('resources/assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Ionicons js-->
    <script src="{{ URL::To('resources/assets/back/plugins/ionicons/ionicons.js')}}"></script>

    <!-- Rating js-->
    <script src="{{ URL::To('resources/assets/back/plugins/rating/jquery.rating-stars.js')}}"></script>

    <!-- Flot js-->
    <script src="{{ URL::To('resources/assets/back/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/js/chart.flot.sampledata.js')}}"></script>

    <!-- Chart.Bundle js-->
    <script src="{{ URL::To('resources/assets/back/plugins/chart.js/Chart.bundle.min.js')}}"></script>

    <!-- Peity js-->
    <script src="{{ URL::To('resources/assets/back/plugins/peity/jquery.peity.min.js')}}"></script>

    <!-- Jquery-Ui js-->
    <script src="{{ URL::To('resources/assets/back/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <!-- Select2 js-->
    <script src="{{ URL::To('resources/assets/back/plugins/select2/js/select2.min.js')}}"></script>

    <!-- Data Table js -->
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/js/table-data.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/fileexport/jszip.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
    <script src="{{ URL::to('resources/assets/back/js/new-tinymce/tinymce.min.js') }}"></script>

    <!---Fileupload css-->
    <script src="{{ URL::To('resources/assets/back/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/fileuploads/js/file-upload.js')}}"></script>

    <!--Fancy uploader js-->
    <script src="{{ URL::To('resources/assets/back/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/plugins/fancyuploder/fancy-uploader.js')}}"></script>

    <!---Select2 js-->
    <script src="{{ URL::To('resources/assets/back/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{ URL::To('resources/assets/back/js/select2.js')}}"></script>

    <!-- Jquery.mCustomScrollbar js-->
    <script src="{{ URL::To('resources/assets/back/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- Perfect-scrollbar js-->
    <script src="{{URL::To('resources/assets/back/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <!-- Sidemenu js-->
    <script src="{{URL::To('resources/assets/back/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- Sidebar js-->
    @if(app()->getLocale() == 'en')
    <script src="{{URL::To('resources/assets/back/plugins/sidebar/sidebar.js')}}"></script>
    @else
    <script src="{{URL::To('resources/assets/back/plugins/sidebar/sidebar-rtl.js')}}"></script>
    @endif

    <!-- Sticky js-->
    <script src="{{URL::To('resources/assets/back/js/sticky.js')}}"></script>

    <!-- Dashboard js-->
    <script src="{{URL::To('resources/assets/back/js/index.js')}}"></script>

    <!-- Custom js-->
    <script src="{{URL::To('resources/assets/back/js/custom.js')}}"></script>

    <!-- Gallery js-->
    <script src="{{URL::To('resources/assets/back/plugins/gallery/picturefill.js')}}"></script>
    <script src="{{URL::To('resources/assets/back/plugins/gallery/lightgallery.js')}}"></script>
    <script src="{{URL::To('resources/assets/back/plugins/gallery/lightgallery-1.js')}}"></script>
    <script src="{{URL::To('resources/assets/back/plugins/gallery/lg-pager.js')}}"></script>
    <script src="{{URL::To('resources/assets/back/plugins/gallery/lg-autoplay.js')}}"></script>
    <script src="{{URL::To('resources/assets/back/plugins/gallery/lg-fullscreen.js')}}"></script>
    <script src="{{URL::To('resources/assets/back/plugins/gallery/lg-zoom.js')}}"></script>
    <script src="{{URL::To('resources/assets/back/plugins/gallery/lg-hash.js')}}"></script>
    <script src="{{URL::To('resources/assets/back/plugins/gallery/lg-share.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


    @yield('script')

    <script>
            // Disable F12 key
        //     document.addEventListener('keydown', function (event) {
        //       if (event.key === 'F12' || event.keyCode === 123) {
        //         event.preventDefault();
        //       }
        //     });
            
        //     // Disable Ctrl+Shift+I
        //     document.addEventListener('keydown', function (event) {
        //       if (event.ctrlKey && event.shiftKey && (event.key === 'I' || event.keyCode === 73)) {
        //         event.preventDefault();
        //       }
        //     });
        // 	document.onkeydown = function(e) {
        //         if (e.ctrlKey && 
        //             (e.keyCode === 67 || 
        //              e.keyCode === 86 || 
        //              e.keyCode === 85 || 
        //              e.keyCode === 117)) {
        // 				//  alert('Content is protected\nYou cannot view the page source.');
        //             return e.preventDefault();
        //         } else {
        //             return true;
        //         }
        //     };  
        // 	$(document).keypress("u",function(e) {
        //     	if(e.ctrlKey)
        //     	{
        //     	return e.preventDefault();
        //     	}
        //     	else
        //     	{
        //     	return true;
        //     	}
        //     });
        ///////// HTML editor ////////////////
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
        tinymce.init({
          selector: 'textarea.area1',
          plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
          editimage_cors_hosts: ['picsum.photos'],
          menubar: 'file edit view insert format tools table help',
          toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
          toolbar_sticky: true,
          toolbar_sticky_offset: isSmallScreen ? 102 : 108,
          autosave_ask_before_unload: true,
          autosave_interval: '30s',
          autosave_prefix: '{path}{query}-{id}-',
          autosave_restore_when_empty: false,
          autosave_retention: '2m',
          image_advtab: true,
          link_list: [
            { title: 'My page 1', value: 'https://www.tiny.cloud' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
          ],
          image_list: [
            { title: 'My page 1', value: 'https://www.tiny.cloud' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
          ],
          image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
          ],
          importcss_append: true,
          file_picker_callback: (callback, value, meta) => {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
              callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
            }
        
            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
              callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
            }
        
            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
              callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
            }
          },
          templates: [
            { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
          ],
          template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
          template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
          height: 600,
          image_caption: true,
          quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
          noneditable_class: 'mceNonEditable',
          toolbar_mode: 'sliding',
          contextmenu: 'link image table',
          skin: useDarkMode ? 'oxide-dark' : 'oxide',
          content_css: useDarkMode ? 'dark' : 'default',
          content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

        ///////// MAPS with lat and long//////
        var lat = $('#latitude').val();
        var long = $('#longitude').val();

        if (lat != '') {
            function initMap2() {
                var uluru = {
                    lat: Number(lat),
                    lng: Number(long)
                };
                var myOptions = {
                        zoom: 15,
                        center: new google.maps.LatLng(lat, long)
                    },
                    map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
                    marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                    }),
                    infowindow = new google.maps.InfoWindow;
                map.addListener('click', function(e) {
                    map.setCenter(e.latLng);
                    marker.setPosition(e.latLng);
                    infowindow.setContent("Latitude: " + e.latLng.lat() +
                        "<br>" + "Longitude: " + e.latLng.lng());
                    infowindow.open(map, marker);
                    var s = $('#latitude').val(e.latLng.lat());
                    var ss = $('#longitude').val(e.latLng.lng());
                });
            }
        } else {
            function initMap1() {
                var uluru = {
                    lat: 30.0096523304429,
                    lng: 31.22744746506214
                };
                var myOptions = {
                        zoom: 10,
                        center: new google.maps.LatLng(30.0096523304429, 31.22744746506214)
                    },
                    map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
                    marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                    }),
                    infowindow = new google.maps.InfoWindow;
                map.addListener('click', function(e) {
                    map.setCenter(e.latLng);
                    marker.setPosition(e.latLng);
                    infowindow.setContent("Latitude: " + e.latLng.lat() +
                        "<br>" + "Longitude: " + e.latLng.lng());
                    infowindow.open(map, marker);
                    var s = $('#latitude').val(e.latLng.lat());
                    var ss = $('#longitude').val(e.latLng.lng());
                });
            }
        }



        $("form").submit(function() {
            $('#loader').show();
        });


        ///////check All adata table//////
        var lang = "{{app()->getLocale()}}";
        if(lang == "ar"){
            var table = $('#exportexample').DataTable( {
        		lengthChange: false,
        		dom: 'Bfrtip',
        		"pageLength": 50,
        		buttons: [ 'copy', 'excel', 'colvis' ],
        		language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.3/i18n/ar.json',
                },
        	} );
        }else{
            var table = $('#exportexample').DataTable( {
        		lengthChange: false,
        		dom: 'Bfrtip',
        		"pageLength": 50,
        		buttons: [ 'copy', 'excel', 'colvis' ],
        	} );
        }


        $("#checkAll").change(function() {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });

        $(".checkAll").change(function() {
            $(".web").prop('checked', $(this).prop("checked"));
        });

        $(".checkAllcart").change(function() {
            $(".cart").prop('checked', $(this).prop("checked"));
        });


        //// btn_delete ////
        $(document).ready(function(){
            $('#btn_delete').click(function(){

                var id = [];
                <?php
                $last_word = Request::segment(2);
                Session::put('route', $last_word);
                ?>
                $('.tableChecked:checked').each(function(i){
                    id[i] = $(this).val();
                });
                if(id.length === 0) //tell you if the array is empty
                {
                    alert("Please Select atleast one checkbox");
                }
                else
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:"<?php echo Session::get('route')?>/"+ id,
                        type:'DELETE',
                        data:{id:id},
                        success:function()
                        {
                            for(var i=0; i<id.length; i++)
                            {
                                $('tr#'+id[i]+'').css('background-color', '#ccc');
                                $('tr#'+id[i]+'').fadeOut('slow');
                                $('input:checkbox').removeAttr('checked');
                            }
                        }
                    });
                }


            });
        });

        //// btn_active ////
        $(document).ready(function(){
            $('#btn_active').click(function(){
                var id = [];
                <?php
                $last_word = Request::segment(2);
                Session::put('route', $last_word);
                ?>
                $('.tableChecked:checked').each(function(i){
                    id[i] = $(this).val();
                });
                console.log(id);
                if(id.length === 0) //tell you if the array is empty
                {
                    alert("Please Select atleast one checkbox");
                }
                else
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:"<?php echo Session::get('route')?>/up/"+ id,
                        method:'POST',
                        data:{id:id},
                        success:function()
                        {
                            $('input:checkbox').removeAttr('checked');
                            location.reload();
                        }
                    });
                }
            });

            $('#btn_back').click(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"backup",
                    method:'GET',
                    success:function()
                    {

                    }
                });

            });

        });
    </script>

</body>

</html>