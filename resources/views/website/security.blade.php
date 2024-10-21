@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
    @php echo $schema @endphp
    <style>
    .cb-layout, .text-white {
  background-color: #000 !important;
  color:#fff !important;
}

        .cb-cursor {
  color: #fff !important;
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
  background-image: url({{ url('resources/assets/front/download\ \(1\).svg') }}) !important;
}

.cb-checkbox_rounded label > input:checked ~ .cb-checkbox_rounded-box .cb-checkbox_rounded-title {
  color: #000 !important;
}

svg:not(:root) {
  color: #000 !important;
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

section{
    background-color: #000 !important;
    color: #fff !important;
}

.cb-outro {
padding-top: 100px !important;
  background: #fff !important;
  color: #000 !important;
}
.cb-screenshot-preview img, .cb-screenshot-preview video{
    object-fit: unset !important;
}
.cb-navbar-logo a img{
    width: 150px !important;
}
.cb-outro-address, .cb-outro-link:lang(ru){
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
                height: 24vh !important;
                min-height:290px !important
    }
        }

        @media (min-width: 768px) {
            .cb-description-text.fix-w {
                max-width: 100% !important;
                margin: 55px 0 0 0;
                font-size: 22px;
                line-height: 150%
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

@endsection
@section('controller')
    <div class="cb-view" data-controller="projectController" id="view-main"><canvas class="cb-scene"></canvas>
    @endsection

    @section('content')
        @if (app()->getLocale() == 'ar')
            <div class="cb-navbar">
                <div class="cb-navbar-strip">
                    <div class="cb-navbar-grid">
                        <div class="cb-navbar-grid-col -left">
                            <div class="cb-navbar-logo">
                                <a href="https://www.allsafeeg.com/en" aria-label="All Safe">
                                    <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="cb-navbar-grid-col -right">
                            <div class="cb-navbar-toggle"><button class="cb-btn cb-btn_menu" aria-label="menu"><span
                                        class="cb-btn_menu-title">القائمة</span><span class="cb-btn_menu-box"
                                        style="visibility:hidden"><span></span><span></span></span></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <header class="cb-tophead">
                <div class="cb-tophead-content">
                    <div class="cb-tophead-container">
                        <div class="cb-tophead-title -lg">
                            <h1>خطط الامن</h1>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Img -->
            <section class="cb-screenshot">
                    <div class="cb-screenshot-preview -lg" style="width: 100%"><img src="{{url('resources/assets/front')}}/web security.png"  alt></div>
            </section>
            <section dir="rtl">
                <div class="cb-brief-container">
                    <div class="pt-5 mt-5 row g-4">
                        <div class="col-lg-10">
                            <div class="cb-tophead">
                                <div class="cb-tophead-content">
                                    <div class="cb-tophead-title -lg">
                                        <h2 class="text-capitalize fw-bold">أمن منتجاتك الرقمية على بعد <span
                                                style="color: #e2fd64;">نقرة واحدة</span> فقط<br>مع All Safe.
                                        </h2>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Description (Text) -->
            <section class="cb-splitshow">
                <div class="cb-splitshow-content -cp">
                    <div class="cb-splitshow-container">
                        <div class="cb-splitshow-items" style="margin: 0">
                            <div class="cb-splitshow-col -left">
                                <div class="cb-splitshow-item" style="margin: 0">
                                    <div class="cb-description-header">
                                        <h2 class="text-capitalize">مرحباً بالعالم،<br> أهلاً بكم في <span
                                                style="color: #e2fd64;">All Safe</span></h2>
                                    </div>
                                    <div class="cb-description-text">
                                        <p>
                                        <p>نحن متخصصون في حماية الأصول الرقمية عبر مجالات متعددة، ونتفاخر بالخبرة في
                                            أكثر من 9 مجالات متميزة في مجال الأمن السيبراني. مع فريق متمرس يضم أكثر من
                                            100 محترف، قدمنا بنجاح أكثر من 250 مشروعاً، مؤمنين البنى التحتية الحيوية
                                            وحماية بيانات العملاء من التهديدات المتطورة.</p>
                                        <p>تضمن تفانينا المستمر أن تكون السلامة متواجدة في كل مكان، نسعى لتعزيز نظامك
                                            الرقمي وتوفير راحة البال في عالم السيبراني المتطور باستمرار.
                                        </p>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="cb-splitshow-col -right">
                                <div class="cb-splitshow-item" style="margin: 0">
                                    <div class="cb-splitshow-preview -sm"><img
                                            src="{{url('resources/assets/front')}}/101714cd137f24f2ad7a1aaf7f2f5cfe.png"
                                            srcset="{{url('resources/assets/front')}}/101714cd137f24f2ad7a1aaf7f2f5cfe.png 2x" loading="lazy" alt>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- contact -->
            <section class="cb-request ">
                <div class="cb-request-content">
                    <div class="cb-request-container">
                        <div class="cb-request-header">
                            <h1 class="text-white">مرحباً! أخبرنا بكل شيء <img
                                    src="{{ asset('front/img') }}/emoji/lg/1F44B.png"
                                    srcset="{{ asset('front/img') }}/emoji/lg/1F44B@2x.png 2x"
                                    alt></h1>
                        </div>
                        <div class="cb-request-form">
                            <form class="cb-form" action="https://www.allsafeeg.com/en/save/contact-us" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="qXPVcBlLMygOMU468TYRBzfD9DkHOPWaPWl71FcW">
                                <div class="cb-form-group">
                                    <div class="cb-form-label -smooth">أنا مهتم بـ...</div>
                                    <div class="cb-checkbox-group">
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="checkbox" name="service[]" value="Websites"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span data-text="Websites">المواقع
                                                            الإلكترونية
                                                        </span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="checkbox" name="service[]" value="Apps"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span data-text="Apps">التطبيقات
                                                        </span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="checkbox" name="service[]" value="Branding"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span data-text="Branding">العلامة
                                                            التجارية
                                                        </span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>

                                    </div>
                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_light"
                                        data-validity-msg='{"valueMissing":"يرجى ملء اسمك"}'>
                                        <div class="cb-input_light-box"><input type="text" name="name"
                                                placeholder="اسمك" required aria-label="اسمك">

                                            <div class="cb-input_light-line"></div>
                                        </div>
                                        <div class="cb-input_light-message"></div>
                                    </div>
                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_light"
                                        data-validity-msg='{"valueMissing":"يرجى ملء عنوان بريدك الإلكتروني","typeMismatch":"عنوان البريد الإلكتروني يبدو غريبًا بعض الشيء"}'>
                                        <div class="cb-input_light-box"><input type="email" name="email"
                                                placeholder="بريدك الإلكتروني" required aria-label="بريدك الإلكتروني">

                                            <div class="cb-input_light-line"></div>
                                        </div>
                                        <div class="cb-input_light-message"></div>
                                    </div>
                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_light">
                                        <div class="cb-input_light-box">
                                            <textarea name="message" placeholder="أخبرنا عن مشروعك" aria-label="أخبرنا عن مشروعك" required></textarea>

                                            <div class="cb-input_light-line"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-form-label -smooth">ميزانية المشروع (دولار أمريكي)</div>
                                    <div class="cb-checkbox-group">
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="10-20k" required><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="10-20k">10-20k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="30-40k"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="30-40k">30-40k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="40-50k"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="40-50k">40-50k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="50-100k"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="50-100k">50-100k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="more100k"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span data-text="&gt; 100k">>
                                                            100k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                    </div>

                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_file"
                                        data-validity="{&quot;size&quot;:26214400,&quot;limit&quot;:10}"
                                        data-validity-msg='{"size":"لقد تجاوز حجم الملف المحدود (25 ميغابايت)","limit":"يمكنك إرفاق حتى 10 ملفات"}'>
                                        <input type="file" name="attachments"><button class="cb-input_file-btn"
                                            type="button"><svg class="cb-svgsprite -attachment">
                                                <use
                                                    xlink:href="{{ asset('front/img') }}/sprites/svgsprites.svg?2#attachment">
                                                </use>
                                            </svg><span>إضافة مرفق</span></button>
                                        <div class="cb-input_file-items"></div>
                                        <div class="cb-input_file-message"></div>
                                    </div>
                                </div>
                                <div class="cb-form-submit"><button class="cb-btn cb-btn_send" type="submit"
                                        data-magnetic data-cursor="-opaque"><span data-text="Send Request">إرسال
                                            الطلب
                                        </span></button></div>

                                <div class="cb-form-terms text-light">هذا الموقع محمي بواسطة reCAPTCHA و
                                    سياسة الخصوصية من Google <a href="https://policies.google.com/privacy"
                                        class="text-light text-decoration-underline" target="_blank">Privacy
                                        Policy</a>
                                    <a href="https://policies.google.com/terms"
                                        class="text-light text-decoration-underline" target="_blank">Terms of
                                        Service</a>
                                    و Apply
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Spilt Images -->
            <section class="cb-splitshow py-80">
                <div class="cb-splitshow-content -cp">
                    <div class="cb-splitshow-container">
                        <div class="cb-splitshow-items">
                            <div class="cb-splitshow-col -left">
                                <h3 class="text-white fw-bold h1">التوعية الأمنية</h3>
                                <div class="cb-splitshow-item">
                                    <div class="cb-splitshow-preview -sm"><img src="{{url('resources/assets/front')}}/image 33.png"
                                            srcset="{{url('resources/assets/front')}}/image 33.png 3x" loading="lazy" alt>
                                    </div>
                                </div>
                            </div>
                            <div class="cb-splitshow-col -right">
                                
                                <div class="cb-splitshow-item">
                                    <div class="cb-splitshow-preview -sm"><img src="{{url('resources/assets/front')}}/image 36.png"
                                            srcset="{{url('resources/assets/front')}}/image 36.png 2x" loading="lazy" alt>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cb-splitshow py-80">
                <div class="cb-splitshow-content -cp">
                    <div class="cb-splitshow-container">
                        <div class="cb-splitshow-items">
                            <div class="cb-splitshow-col -left">
                                <div class="cb-splitshow-item">
                                    <div class="cb-description-text fix-w w-100">
                                        <ul class="list-unstyled w-100">
                                            <li class="my-4 w-100">
                                                <p class="fw-bold w-100">برامج تدريب الموظفين:</p>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li>
                                                        <p>الوحدات التعليمية الإلكترونية: توفير دورات عبر الإنترنت يمكن
                                                            للموظفين إكمالها وفقًا لسرعتهم الخاصة.</p>
                                                    </li>
                                                    <li>
                                                        <p>الوحدات التعليمية الإلكترونية: توفير دورات عبر الإنترنت يمكن
                                                            للموظفين إكمالها وفقًا لسرعتهم الخاصة.</p>
                                                    </li>
                                                    <li>
                                                        <p>الوحدات التعليمية الإلكترونية: توفير دورات عبر الإنترنت يمكن
                                                            للموظفين إكمالها وفقًا لسرعتهم الخاصة.</p>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="my-4">
                                                <p class="fw-bold">برامج تدريب الموظفين:</p>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li>
                                                        <p>الوحدات التعليمية الإلكترونية: توفير دورات عبر الإنترنت يمكن
                                                            للموظفين إكمالها وفقًا لسرعتهم الخاصة.</p>
                                                    </li>
                                                    <li>
                                                        <p>الوحدات التعليمية الإلكترونية: توفير دورات عبر الإنترنت يمكن
                                                            للموظفين إكمالها وفقًا لسرعتهم الخاصة.</p>
                                                    </li>
                                                    <li>
                                                        <p>الوحدات التعليمية الإلكترونية: توفير دورات عبر الإنترنت يمكن
                                                            للموظفين إكمالها وفقًا لسرعتهم الخاصة.</p>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <div class="cb-navbar">
                <div class="cb-navbar-strip">
                    <div class="cb-navbar-grid">
                        <div class="cb-navbar-grid-col -left">
                            <div class="cb-navbar-logo">
                                <a href="https://www.allsafeeg.com/en" aria-label="All Safe">
                                    <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="cb-navbar-grid-col -right">
                            <div class="cb-navbar-toggle"><button class="cb-btn cb-btn_menu" aria-label="menu"><span
                                        class="cb-btn_menu-title">Menu</span><span class="cb-btn_menu-box"
                                        style="visibility:hidden"><span></span><span></span></span></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <header class="cb-tophead">
                <div class="cb-tophead-content">
                    <div class="cb-tophead-container">
                        <div class="cb-tophead-title -lg">
                            <h1>Security Plans</h1>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Img -->
            <section class="cb-screenshot">
                <div class="cb-screenshot-preview -lg" style="width: 100%"><img src="{{url('resources/assets/front')}}/web security.png"  alt></div>
        </section>
            <section>
                <div class="cb-brief-container">
                    <div class="pt-5 mt-5 row g-4">
                        <div class="col-lg-10">
                            <div class="cb-tophead">
                                <div class="cb-tophead-content">
                                    <div class="cb-tophead-title -lg">
                                        <h2 class="text-capitalize fw-bold ">Security for your digital
                                            products is
                                            just a <span style="color: #e2fd64;">click away</span> <br>with All Safe.
                                        </h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Description (Text) -->
            <section class="cb-splitshow">
                <div class="cb-splitshow-content -cp">
                    <div class="cb-splitshow-container">
                        <div class="cb-splitshow-items" style="margin: 0;">
                            <div class="cb-splitshow-col -left">
                                <div class="cb-splitshow-item" style="margin: 0">
                                    <div class="cb-description-header">
                                        <h2 class="text-capitalize">Hello Worldwide,<br> welcome to <span
                                                style="color: #e2fd64;">All Safe</span></h2>
                                    </div>
                                    <div class="cb-description-text">
                                        <p>
                                        <p>We specialize in safeguarding digital assets across multiple domains,
                                            boasting
                                            expertise
                                            in over 9 distinct fields of cybersecurity. With a seasoned team of over 100
                                            professionals, we've successfully delivered over 250 projects, securing
                                            vital
                                            infrastructures and protecting client data from evolving threats.</p>
                                        <p>Our relentless dedication ensures that safety is ubiquitous, striving to
                                            fortify
                                            your
                                            digital ecosystem and provide peace of mind in an ever-evolving cyber
                                            landscape.
                                        </p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="cb-splitshow-col -right">
                                <div class="cb-splitshow-item" style="margin: 0">
                                    <div class="cb-splitshow-preview -sm"><img
                                            src="{{url('resources/assets/front')}}/101714cd137f24f2ad7a1aaf7f2f5cfe.png"
                                            srcset="{{url('resources/assets/front')}}/101714cd137f24f2ad7a1aaf7f2f5cfe.png 2x" loading="lazy" alt>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- contact -->
            <section class="cb-request ">
                <div class="cb-request-content">
                    <div class="cb-request-container">
                        <div class="cb-request-header">
                            <h1 class="text-white">Hey! Tell us all<br> the things <img
                                    src="{{ asset('front/img') }}/emoji/lg/1F44B.png"
                                    srcset="{{ asset('front/img') }}/emoji/lg/1F44B@2x.png 2x"
                                    alt></h1>
                        </div>
                        <div class="cb-request-form">
                            <form class="cb-form" action="https://www.allsafeeg.com/en/save/contact-us" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="qXPVcBlLMygOMU468TYRBzfD9DkHOPWaPWl71FcW">
                                <div class="cb-form-group">
                                    <div class="cb-form-label -smooth">I&#039;m interested in...</div>
                                    <div class="cb-checkbox-group">
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="checkbox" name="service[]" value="Websites"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="Websites">Websites
                                                        </span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="checkbox" name="service[]" value="Apps"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span data-text="Apps">Apps
                                                        </span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="checkbox" name="service[]" value="Branding"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="Branding">Branding
                                                        </span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>

                                    </div>
                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_light"
                                        data-validity-msg='{"valueMissing":"Please fill your name"}'>
                                        <div class="cb-input_light-box"><input type="text" name="name"
                                                placeholder="Your Name" required aria-label="Your name">

                                            <div class="cb-input_light-line"></div>
                                        </div>
                                        <div class="cb-input_light-message"></div>
                                    </div>
                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_light"
                                        data-validity-msg='{"valueMissing":"Please fill your email address","typeMismatch":"That email address looks a bit weird"}'>
                                        <div class="cb-input_light-box"><input type="email" name="email"
                                                placeholder="Your Email" required aria-label="Your email">

                                            <div class="cb-input_light-line"></div>
                                        </div>
                                        <div class="cb-input_light-message"></div>
                                    </div>
                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_light">
                                        <div class="cb-input_light-box">
                                            <textarea name="message" placeholder="Tell us about your project" aria-label="Tell us about your project" required></textarea>

                                            <div class="cb-input_light-line"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-form-label -smooth">Project budget (USD)</div>
                                    <div class="cb-checkbox-group">
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="10-20k" required><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="10-20k">10-20k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="30-40k"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="30-40k">30-40k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="40-50k"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="40-50k">40-50k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="50-100k"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span
                                                            data-text="50-100k">50-100k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                        <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                    type="radio" name="budget" value="more100k"><span
                                                    class="cb-checkbox_rounded-box"><span
                                                        class="cb-checkbox_rounded-title"><span data-text="&gt; 100k">>
                                                            100k</span></span><span
                                                        class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                        </div>
                                    </div>

                                </div>
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_file"
                                        data-validity="{&quot;size&quot;:26214400,&quot;limit&quot;:10}"
                                        data-validity-msg='{"size":"Size limit has been exceeded (25 mb)","limit":"Attach up to 10 files"}'>
                                        <input type="file" name="attachments"><button class="cb-input_file-btn"
                                            type="button"><svg class="cb-svgsprite -attachment">
                                                <use
                                                    xlink:href="{{ asset('front/img') }}/sprites/svgsprites.svg?2#attachment">
                                                </use>
                                            </svg><span>Add Attachment</span></button>
                                        <div class="cb-input_file-items"></div>
                                        <div class="cb-input_file-message"></div>
                                    </div>
                                </div>
                                <div class="cb-form-submit"><button class="cb-btn cb-btn_send" type="submit"
                                        data-magnetic data-cursor="-opaque"><span data-text="Send Request">Send
                                            Request
                                        </span></button></div>

                                <div class="cb-form-terms text-light">This site is protected by reCAPTCHA and the
                                    Google <a href="https://policies.google.com/privacy"
                                        class="text-light text-decoration-underline" target="_blank">Privacy
                                        Policy</a>
                                    <a href="https://policies.google.com/terms"
                                        class="text-light text-decoration-underline" target="_blank">Terms of
                                        Service</a>
                                    and Apply
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Spilt Images -->
            <section class="cb-splitshow py-80">
                <div class="cb-splitshow-content -cp">
                    <div class="cb-splitshow-container">
                        <div class="cb-splitshow-items">
                            <div class="cb-splitshow-col -left">
                                <h3 class="text-white fw-bold h1">Security <br>Awareness</h3>
                                <div class="cb-splitshow-item">
                                    <div class="cb-splitshow-preview -sm"><img src="{{url('resources/assets/front')}}/image 33.png"
                                            srcset="{{url('resources/assets/front')}}/image 33.png 3x" loading="lazy" alt>
                                    </div>
                                </div>
                            </div>
                            <div class="cb-splitshow-col -right">
                                
                                <div class="cb-splitshow-item">
                                    <div class="cb-splitshow-preview -sm"><img src="{{url('resources/assets/front')}}/image 36.png"
                                            srcset="{{url('resources/assets/front')}}/image 36.png 2x" loading="lazy" alt>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cb-splitshow py-80">
                <div class="cb-splitshow-content -cp">
                    <div class="cb-splitshow-container">
                        <div class="cb-splitshow-items">
                            <div class="cb-splitshow-col -left">
                                <div class="cb-splitshow-item">
                                    <div class="cb-description-text fix-w w-100">
                                        <ul class="list-unstyled w-100">
                                            <li class="my-4 w-100">
                                                <p class="fw-bold w-100">Employee Training Programs:</p>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li>
                                                        <p>E-learning Modules: Provide online courses that employees can
                                                            complete at their own pace.</p>
                                                    </li>
                                                    <li>
                                                        <p>E-learning Modules: Provide online courses that employees can
                                                            complete at their own pace.</p>
                                                    </li>
                                                    <li>
                                                        <p>E-learning Modules: Provide online courses that employees can
                                                            complete at their own pace.</p>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="my-4">
                                                <p class="fw-bold">Employee Training Programs:</p>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li>
                                                        <p>E-learning Modules: Provide online courses that employees can
                                                            complete at their own pace.</p>
                                                    </li>
                                                    <li>
                                                        <p>E-learning Modules: Provide online courses that employees can
                                                            complete at their own pace.</p>
                                                    </li>
                                                    <li>
                                                        <p>E-learning Modules: Provide online courses that employees can
                                                            complete at their own pace.</p>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endsection
