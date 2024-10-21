@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')
<section class="section">
@include('dashboard.alerts.alert')
    @if(count($pricings) > 0)
    <div class="content-row dark-section">
        <div class="price-section">
            @foreach($pricings as $pricing)
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="item-1">
                                <article class="price-table">
                                    <div class="price">
                                        <del>${{$pricing->price}}</del>
                                    </div>
                                    <div class="price">${{$pricing->discount}}</div>
                                    <h2 class="title">{{$pricing->{'name_'.$lang} }}</h2>
                                    <p class="description">{!! $pricing->{'desc_'.$lang} !!}
                                    </p>
                                    <div class="features">

                                        @php
                                            $texts = explode(',',$pricing->{'text_'.$lang} );
                                        @endphp                                                    
                                        @foreach($texts as $text)
                                        <details class="feature">
                                            <summary>
                                                <i aria-hidden="true" class="checkmark">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                                                </svg>
                                            </i>
                                                <span class="name">{!! $text !!}</span>
                                                <i aria-hidden="true" class="question-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.501 3.501 0 1 1 13 13.355z" />
                                                </svg>
                                            </i>
                                            </summary>
                                            <!-- <div class="answer">
                                                {{$text}}
                                            </div> -->
                                        </details>
                                        @endforeach
                                    </div>
                                    <div class="button-wrap right">
                                        <div class="icon-wrap parallax-wrap">
                                            <div class="button-icon parallax-element">
                                                <i class="arrow-icon-down"></i>
                                            </div>
                                        </div>
                                        <form action="{{LaravelLocalization::localizeUrl('/dashboard/upgrade')}}" method="post">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{$pricing->id}}">
                                            <button class="@if($pricing->id == $user->plan_id) btn text-white btn-primary @else btn text-white btn-outline-primary @endif" type="submit">
                                                @if($pricing->id == $user->plan_id) {{trans('home.your_current_plan')}} @else {{trans('home.upgrade')}} @endif
                                            </button>
                                        </form>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <div class="item-1">
                                <article class="price-table">
                                <div class="price">
                                        <del>${{$pricing->price}}</del>
                                    </div>
                                    <div class="price">${{$pricing->discount}}</div>
                                    <h2 class="title">{{$pricing->{'name_'.$lang} }}</h2>
                                    <p class="description">{!! $pricing->{'desc_'.$lang} !!}
                                    </p>
                                    <div class="features">
                                        @foreach($texts as $text)
                                        <details class="feature">
                                            <summary>
                                                <i aria-hidden="true" class="checkmark">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                                                </svg>
                                            </i>
                                                <span class="name">{!! $text !!}</span>
                                                <i aria-hidden="true" class="question-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.501 3.501 0 1 1 13 13.355z" />
                                                </svg>
                                            </i>
                                            </summary>
                                            <!-- <div class="answer">
                                                {{$text}}
                                            </div> -->
                                        </details>
                                        @endforeach
                                    </div>
                                    <div class="button-wrap right">
                                        <div class="icon-wrap parallax-wrap">
                                            <div class="button-icon parallax-element">
                                                <i class="arrow-icon-down"></i>
                                            </div>
                                        </div>
                                        <form action="{{LaravelLocalization::localizeUrl('/dashboard/upgrade')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$pricing->id}}">
                                            <button class="@if($pricing->id == $user->plan_id) btn text-white btn-primary @else btn text-white btn-outline-primary @endif" type="submit">
                                                @if($pricing->id == $user->plan_id) {{trans('home.your_current_plan')}} @else {{trans('home.upgrade')}} @endif
                                            </button>
                                        </form>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="row">
        <p style="text-align: center; font-weight: bold; font-size:20px; margin:auto; color: #fff">{{trans('home.no_data_in_this_page')}}</p>
    </div>
    @endif
</section>
@endsection

@section('script')
<script>
// Add an event listener to the anchor tag
document.getElementById('submitFormLink').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default behavior of following the link

            // Trigger the form submission
            document.getElementById('myForm').submit();
        });
</script>
@endsection