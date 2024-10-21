<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{LaravelLocalization::localizeUrl('dashboard/home')}}" class="logo logo-dark">
                        <span class="logo-lg text-white">
                            <img src="{{asset('uploads/configration/'. $configration->fav_icon)}}" alt="logo" height="50">
                            {{$configration->{'app_name_'.$lang} }}
                        </span>
                    </a>

                    <a href="{{LaravelLocalization::localizeUrl('dashboard/home')}}" class="logo logo-light">
                        <span class="logo-lg text-white">
                            <img src="{{asset('uploads/configration/'. $configration->fav_icon)}}" alt="logo" height="50">
                            {{$configration->{'app_name_'.$lang} }}
                        </span>
                    </a>
                </div>

                <button type="button"
                    class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="d-flex align-items-center">
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bi bi-arrows-fullscreen fs-16'></i>
                    </button>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('dashboard/assets/images/notfi.png')}}" alt="" height="50">
                        <span
                            class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger" style="visibility: hidden;"><span
                                class="notification-badge" data-bs-count="0">0</span><span class="visually-hidden">unread
                                messages</span></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">

                        <!-- <div class="dropdown-head rounded-top">
                            <div class="p-3 border-bottom border-bottom-dashed">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="mb-0 fs-16 fw-semibold"> Notifications <span
                                                class="badge text-danger  bg-danger-subtle fs-13 notification-badge">
                                                4</span></h6>
                                        <p class="fs-14 text-muted mt-1 mb-0">You have <span
                                                class="fw-semibold notification-unread">3</span> unread messages
                                        </p>
                                    </div>
                                    <div class="col-auto dropdown">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                            class="link-secondary fs-14"><i
                                                class="bi bi-three-dots-vertical"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">All Clear</a></li>
                                            <li><a class="dropdown-item" href="#">Mark all as read</a></li>
                                            <li><a class="dropdown-item" href="#">Archive All</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div> -->

                        <div class="py-2 ps-2" id="notificationItemsTabContent">
                            <div data-simplebar style="max-height: 300px;" class="pe-2">
                                <h6
                                    class="text-overflow text-muted fs-13 my-2 text-uppercase notification-title">
                                    New</h6>
                                <div
                                    class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                    @php
                                        $notifications = App\Models\Notification::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
                                    @endphp
                                    @if(count($notifications) > 0)
                                        @foreach($notifications as $notification)
                                            <div class="d-flex">
                                                <div class="avatar-xs me-3 flex-shrink-0">
                                                    <span
                                                        class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="{{LaravelLocalization::localizeUrl('/dashboard/packages')}}" class="stretched-link">
                                                        <h6 class="mt-0 fs-14 mb-2 lh-base">{{$notification->{'content_'. $lang} }} {{$notification->{'title_'. $lang} }}
                                                            
                                                        </h6>
                                                    </a>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> {{$notification->created_at->diffForHumans()}}</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="all-notification-check01">
                                                        <label class="form-check-label"
                                                            for="all-notification-check01"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3 flex-shrink-0">
                                            <span
                                                class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                <i class="bx bx-badge-check"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 fs-14 mb-2 lh-base">{{trans('home.The beginning of the journey')}}
                                                    
                                                </h6>
                                            </a>
                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> {{auth()->user()->created_at->diffForHumans()}}</span>
                                            </p>
                                        </div>
                                        <div class="px-2 fs-15">
                                            <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="all-notification-check01">
                                                <label class="form-check-label"
                                                    for="all-notification-check01"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- <h6
                                    class="text-overflow text-muted fs-13 my-2 text-uppercase notification-title">
                                    Read Before</h6>

                                <div
                                    class="text-reset notification-item d-block dropdown-item position-relative">
                                    <div class="d-flex">

                                        <div class="position-relative me-3 flex-shrink-0">
                                            <img src="{{asset('dashboard/assets/images/users/avatar-8.jpg')}}"
                                                class="rounded-circle avatar-xs" alt="user-pic">
                                            <span
                                                class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                                                <span class="visually-hidden">New alerts</span>
                                            </span>
                                        </div>

                                        <div class="flex-grow-1">
                                            <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-1 fs-14 fw-semibold">Maureen Gibson</h6>
                                            </a>
                                            <div class="fs-13 text-muted">
                                                <p class="mb-1">We talked about a project on linkedin.</p>
                                            </div>
                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                            </p>
                                        </div>
                                        <div class="px-2 fs-15">
                                            <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="all-notification-check04">
                                                <label class="form-check-label"
                                                    for="all-notification-check04"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="notification-actions" id="notification-actions">
                                <div class="d-flex text-muted justify-content-center align-items-center">
                                    Select <div id="select-content" class="text-body fw-semibold px-1">0</div>
                                    Result <button type="button" class="btn btn-link link-danger p-0 ms-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#removeNotificationModal">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                src="{{asset('uploads/configration/'. $configration->fav_icon)}}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{auth()->user()->name}}
                                    </span>
                                <span
                                    class="d-none d-xl-block ms-1 fs-13 text-reset user-name-sub-text">{{auth()->user()->role}}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">{{trans('home.Welcome')}} {{auth()->user()->name}}!</h6>
                        <a class="dropdown-item" href="{{LaravelLocalization::localizeUrl('/dashboard/profile')}}"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">{{trans('home.profile')}}</span></a>
                        <a class="dropdown-item" href="{{LaravelLocalization::localizeUrl('/dashboard/terms-and-conditions')}}"><i
                                class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">{{trans('home.terms_and_conditions')}}</span></a>
                        <a class="dropdown-item" href="{{LaravelLocalization::localizeUrl('/dashboard/faqs')}}"><i
                                class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">{{trans('home.faqs')}}</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i
                                class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">{{trans('home.available_profit')}} : <b>${{auth()->user()->available_profit}}</b></span></a>
                        <!-- <a class="dropdown-item" href="#"><i
                                class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Settings</span></a> -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-{{trans('home.logout')}}">{{trans('home.logout')}}</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body p-md-5">
                <div class="text-center">
                    <div class="text-danger">
                        <i class="bi bi-trash display-4"></i>
                    </div>
                    <div class="mt-4 fs-15">
                        <h4 class="mb-1">{{trans('home.Are you sure ?')}}</h4>
                        <p class="text-muted mx-4 mb-0">{{trans('home.Are you sure you want to remove this Notification ?')}}</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{trans('home.close')}}</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">{{trans('home.Yes, Delete It!')}}
                        </button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{LaravelLocalization::localizeUrl('/dashboard/home')}}" class="logo logo-dark">
            <span class="logo-lg">
                <img src="{{asset('uploads/configration/'. $configration->app_logo)}}" alt="" height="26">
            </span>
        </a>
        <a href="{{LaravelLocalization::localizeUrl('/dashboard/home')}}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{asset('uploads/configration/'. $configration->app_logo)}}" alt="" height="26">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-{{trans('home.Menu')}}">{{trans('home.Menu')}}</span></li>
                @if($user->plan_id != null)
                    @foreach($menusDashboard as $key=>$menu)
                        @if(count($menu->childs()) > 0)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarPages{{$key}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages{{$key}}">
                                    @if($menu->font_awsome != null) {!! $menu->font_awsome !!} @else  @endif <span data-key="t-{{$menu->{'name_'.$lang} }}">{{$menu->{'name_'.$lang} }}</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarPages{{$key}}">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach($menu->childs() as $child)
                                            <li class="nav-item">
                                                <a href="{{LaravelLocalization::localizeUrl('dashboard/' . $child->type)}}" class="nav-link" data-key="t-{{$child->{'name_'.$lang} }}"> {{$child->{'name_'.$lang} }} </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{LaravelLocalization::localizeUrl('dashboard/' . $menu->type)}}" class="nav-link menu-link @if(Request::segment(3) == $menu->type) active @endif">  @if($menu->font_awsome != null) {!! $menu->font_awsome !!} @else  @endif <span data-key="t-{{$menu->{'name_'.$lang} }}">{{$menu->{'name_'.$lang} }}</span> </a>
                            </li>
                        @endif
                    @endforeach
                @else
                    @foreach($menusDashboard_new as $key=>$menu_new)
                        @if(count($menu_new->childs_new()) > 0)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarPages{{$key}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages{{$key}}">
                                    @if($menu_new->font_awsome != null) {!! $menu_new->font_awsome !!} @else  @endif <span data-key="t-{{$menu_new->{'name_'.$lang} }}">{{$menu_new->{'name_'.$lang} }}</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarPages{{$key}}">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach($menu_new->childs_new() as $child_new)
                                            <li class="nav-item">
                                                <a href="{{LaravelLocalization::localizeUrl('dashboard/' . $child_new->type)}}" class="nav-link" data-key="t-{{$child_new->{'name_'.$lang} }}"> {{$child_new->{'name_'.$lang} }} </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{LaravelLocalization::localizeUrl('dashboard/' . $menu_new->type)}}" class="nav-link menu-link @if(Request::segment(3) == $menu_new->type) active @endif">  @if($menu_new->font_awsome != null) {!! $menu_new->font_awsome !!} @else  @endif <span data-key="t-{{$menu_new->{'name_'.$lang} }}">{{$menu_new->{'name_'.$lang} }}</span> </a>
                            </li>
                        @endif
                    @endforeach
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->