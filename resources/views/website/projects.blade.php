@extends('layouts.app')

@section('meta')
    @php echo $metatags @endphp
@endsection
@section('controller')
    <div class="cb-view" data-controller="projectsController" id="view-main"><canvas class="cb-scene"></canvas>
@endsection

@section('content')
    <div class="cb-navbar">
        <div class="cb-navbar-strip">
            <div class="cb-navbar-grid">
                <div class="cb-navbar-grid-col -left">
                    <div class="cb-navbar-logo">
                        <a href="{{LaravelLocalization::localizeUrl('/')}}" aria-label="All Safe">
                            <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="cb-navbar-grid-col -right">
                    <div class="cb-navbar-toggle"><button class="cb-btn cb-btn_menu" aria-label="menu"><span
                                class="cb-btn_menu-title">{{trans('home.menu')}}</span><span class="cb-btn_menu-box"
                                style="visibility:hidden"><span></span><span></span></span></button></div>
                </div>
            </div>
        </div>
    </div>

    @if (count($projects) > 0)
    <section class="cb-work">
        <div class="cb-work-content">
            <div class="cb-work-container">
                <div class="cb-work-filter">
                    <div class="cb-work-filter-title">{{trans('home.Filter')}}</div>
                    <div class="cb-work-filter-active"><span>{{trans('home.All Projects')}}</span><svg
                            class="cb-svgsprite -arrow-down-o">
                            <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#arrow-down-o')}}"></use>
                        </svg></div>
                </div>
            </div>
        </div>
    </section>
    <section class="cb-splitshow">
                <div class="cb-splitshow-content -ct">
                    <div class="cb-splitshow-container">
                        <div class="cb-splitshow-items">
                            <div class="cb-splitshow-col -left">
                            @isset($projects[0]->projects(1)[0])
                                @foreach ($projects[0]->projects(1)[0] as $project)
                                    <div class="cb-splitshow-item" data-cat="data{{$project->service_id}}"><a class="cb-splitshow-preview -asm"
                                            href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar) }}" data-cursor="-color-ulesson"
                                            data-cursor-text="view case" aria-label="All Safe">
                                            <picture>
                                                <source
                                                    srcset="{{url('uploads/projects/source/' . $project->image)}}, {{url('uploads/projects/source/' . $project->image)}} 2x"
                                                    media="(min-width:768px)"><img
                                                    src="{{url('uploads/projects/source/' . $project->image)}}"
                                                    srcset="{{url('uploads/projects/source/' . $project->image)}}" alt>
                                            </picture>
                                        </a>
                                        <div class="cb-splitshow-caption">{!! app()->getLocale() == 'en' ? $project->name_en : $project->name_ar !!}
                                            </div>
                                    </div>
                                @endforeach
                            @endisset
                            </div>
                            <div class="cb-splitshow-col -right">
                                @isset($projects[0]->projects(1)[1])
                                    @foreach ($projects[0]->projects(1)[1] as $projectItem)
                                    <div class="cb-splitshow-item" data-cat="data{{$projectItem->service_id}}"><a class="cb-splitshow-preview -asm"
                                            href="{{app()->getLocale() == 'en' ? LaravelLocalization::localizeUrl('project/'.$projectItem->link_en) : LaravelLocalization::localizeUrl('project/'.$projectItem->link_ar) }}" data-cursor="-color-ulesson"
                                            data-cursor-text="view case" aria-label="All Safe">
                                            <picture>
                                                <source
                                                    srcset="{{url('uploads/projects/source/' . $projectItem->image)}}, {{url('uploads/projects/source/' . $projectItem->image)}} 2x"
                                                    media="(min-width:768px)"><img
                                                    src="{{url('uploads/projects/source/' . $projectItem->image)}}"
                                                    srcset="{{url('uploads/projects/source/' . $projectItem->image)}}" alt>
                                            </picture>
                                        </a>
                                        <div class="cb-splitshow-caption">{!! app()->getLocale() == 'en' ? $projectItem->name_en : $projectItem->name_ar !!}
                                            </div>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    @endif
    
@endsection
@section('modal')
    <div class="cb-modal cb-modal_box" id="modal-work-filters">
            <div class="cb-modal_box-backdrop"></div>
            <div class="cb-modal_box-dialog">
                <div class="cb-modal_box-container">
                    <div class="cb-modal_box-nav">
                        <div class="cb-modal_box-nav-item"><a data-filter-target="all"><span
                                    class="cb-modal_box-nav-item-title"><span data-text="{{trans('home.All Projects')}}">{{trans('home.All Projects')}}
                                        </span></span></a></div>
                        @if(count($services) > 0)
                        @foreach($services as $serv)
                        <div class="cb-modal_box-nav-item"><a data-filter-target="data{{$serv->id}}"><span
                                    class="cb-modal_box-nav-item-title"><span
                                        data-text="{{app()->getLocale() == 'en' ? $serv->name_service_en : $serv->name_service_ar}}">{{app()->getLocale() == 'en' ? $serv->name_service_en : $serv->name_service_ar}}</span></span></a></div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @endsection