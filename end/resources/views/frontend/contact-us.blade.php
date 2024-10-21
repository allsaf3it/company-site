@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
    @php echo $schema @endphp
@endsection
@section('data-barba')
    <main class="main theme-nav-dark " id="contact-us" data-barba="container" data-barba-namespace="contact-us">
@endsection
@section('main')
    <header class="section default-header theme-light theme-lightgray contact-header" data-scroll-section>
        <div class="container" data-scroll data-scroll-speed="-7.5" data-scroll-position="top"
            data-scroll-offset="0%, -25%">
            <div class="row row-title">
                <div class="flex-col">
                    <div class="header-title">
                    <h1 class="split-words-wrap">{{trans('home.Need a fresh perspective?')}}</h1>
                    <h1 class="split-words-wrap">
                        <div style="position:relative;display:inline-block;" class="single-word">
                            <div class="icon-sprite"><svg width="120" height="24" viewBox="0 0 120 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 18.28C4.7948 17.5625 3.79406 16.5476 3.09366 15.3324C2.39326 14.1172 2.01668 12.7425 2 11.34C2.08 6.64 6.62 2.91 12.14 3C17.66 3.09 22.07 7 22 11.66C21.93 16.32 17.38 20.09 11.86 20C11.2362 19.99 10.6142 19.9298 10 19.82L5.5 22L6 18.28Z"
                                    stroke="black" stroke-width="2" />
                                <path d="M69.5 5H50.5V19H69.5V5Z" stroke="black" stroke-width="2"
                                    stroke-miterlimit="10" />
                                <path d="M50.5 5L60 12L69.5 5" stroke="black" stroke-width="2"
                                    stroke-miterlimit="10" />
                                <path
                                    d="M102 16C104.485 16 106.5 13.9853 106.5 11.5C106.5 9.01472 104.485 7 102 7C99.5147 7 97.5 9.01472 97.5 11.5C97.5 13.9853 99.5147 16 102 16Z"
                                    stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <path
                                    d="M114 16C116.485 16 118.5 13.9853 118.5 11.5C118.5 9.01472 116.485 7 114 7C111.515 7 109.5 9.01472 109.5 11.5C109.5 13.9853 111.515 16 114 16Z"
                                    stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <path d="M102 16H114" stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <path
                                    d="M40.4774 13.8543L37.8543 15.5729C35.5814 14.2962 33.7038 12.4186 32.4271 10.1457L34.1457 7.52261L32.3367 3H28.7186L27 4.71859C27.401 8.90085 29.2451 12.8131 32.216 15.784C35.1869 18.7549 39.0991 20.599 43.2814 21L45 19.2814V15.6633L40.4774 13.8543Z"
                                    stroke="black" stroke-width="2" stroke-miterlimit="10" />
                                <g clip-path="url(#clip0_201_633)">
                                    <path d="M85 3L76 14H84L83 21L92 10H84L85 3Z" stroke="black" stroke-width="2" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_201_633">
                                        <rect width="24" height="24" fill="white" transform="translate(72)" />
                                    </clipPath>
                                </defs>
                                </svg>
                            </div>
                        </div>
                    </h1>
                    </div>
                    <div class="header-text styled large fade-in">
                    <p>{{trans('home.We engage in projects of varying scales – from helping startups to global brands. Get in touch to see how we can help you.')}}</p>
                    </div>
                </div>
                <div class="flex-col form-col fade-in">
                    <form class="styled-form" data-smart="true" data-target="contact" data-field="contactForm" method="post" action="{{LaravelLocalization::localizeUrl('save/contact-us')}}"
                    data-live="true"
                    data-token="1696535580:contact:a3FqYk40b05UUExNbmJob1p5OXpLUzQ5M2V3bWl6NTVjVFg1ZlNiR1U1dnlETFVMTWxNUktaWE5qdXRnWmJJOEVGaXQ5d3ByZlpFZmFXQWlKRzRQc2VxSVlBT2tQSTNVZEVwQkJlNGZXcWc5UEg2a0ZuTERqcTlSSEozbDF0bUhoRkxSTzM2cWFoUmxvTlliU1p0aVlxVHdaZXJnU3ViWlQwWEFlVzNMUlNVbTNOY2xyRUJISnU2ZDlHa0ZpN1N6eWhheEZqVEJWZTJHdjQ3dkRhcUxlT0FKUWpzcnNicGJYSjRITFRoak40bkJTcDUwelVncjljVzBCZjJ5M3hrb3lIY3VVZ2RyUGszS3RhZ1dRVE5pQmcxYUlqRDkwSHpUNlo5djE0b2tIVE5HRnd5TmxLcHNqOHpWVU1YdTZrUzl5eGJrVTFLMEJJN3J1MHhLQjU2Q3Y1WGJyUnVQRWs3ZGhFekR1YndJbERINUprclVoS2xLUkdyVG1ld0RKWTJobzZNQ3pTWXVpdnVOd0F0WE4wNmprODBZTXRIb0ZEYUZvNmw5OXhnTFUycHZvUHlyS2FUYVI0aXZvak8xTGtPaDNoVjE0WXB3ZmdMaHhUbmg5b0Q5SlB2d1ZhNUx4OTI0MHcwVzdKNElCUEVVcU5RbVM4Yk0wSGFaRVJRRVVMWEtXdFRyQzE4QklGNFdNZlBoSEhBVUdjTUxwblA1V2pWNGF2QW9tQlVvWUhJdndOWnJLeVc3b0lJRDFPRUdYQXl0UkhJZUJLV1BDbVlVRzhsaWwxaFA5SDF0Qlg3ODhLOExueDY2enV2bVdNbXg5MTdHcHlnMEhTOXVnQktDdFo1RDY5S0haUkdDWnpzaVVJSzhsNlVEektycFBTajF5THA0ZlBmRjkwQ0hEVTdhdU9CVmQzcDJkQzhYZFh3RjhMTW1abHBQczhJZVpxUDZnVXFmRXZNMmFTS2RZUUFheFRnWFZZdnlpQUFqQXQ3WTFJdXlNcEtJZGlBZURYajlGaDRzSFNUR2J2ZFZFSk1xMUJiVzJmNUVwcHdKVHhJSHhMWTlUQ2VLcW00Zm5NNHVIbldlb3JNZE1YaWpyZVpDVlJGOGlXNThpQ0xyUDNHb1l6bjNXNERvWnphZWZUUGxNeG9oRVNjVGZZMmdtVlB2UnloWmhuYXFIM2Nyd3BaMnR1cXNqelpDZXdxWmF4WnRDT1MyZ1djRWp6dHd0TVZMQVl6bTk5bVRxTnAwRFpycENnNFF1NzZ6eGlPUTJFUEdoTE9MamNlQkhmZWYzVjEzU3NwN2pYU1dKTkNPOXpTdHNhTzFmNkRIV3hOaTdyTzI4NVdTcjNmY0I0M25EWVpTZ1RDOUw1QzlNbGJvRVVza05rYjF2ajEzWkRqczhRMVc1NmJDeklMQ21ZejdQN0M0b1p5a09Tcm9ONkI4SW1yRzNXNTE2ZzhENlhVWmFuSFZEY3ZFQ3hoMlNVNElpUFA2Q0RlWG1KTDdnQVdIbndBUTUyeUp5a0RzbEZ2MUdlcTBOTHpIVzJ4WnZxVWRrRXN1S3htdnI3cGdJSU9GVFhnRFNZZzJXaUFvQXBNWE85cGQwak92MjQyYm90RzJhRFlJSXgwWkJtdFB0RGlLam81NEpnSnhOUERvMG9ldHJGWW1QRE9rT3hDUHlSSjV4Z3JZSE1jdzJvWTZHMDltVVFSSnVYcmdEZmhGRFBSdlNRNEVNMHc3S1JzbFh2aWZOZ1N6UVh5QXl2MkZCOFlIdkZwNGpjN2IyVDFlVXV6TEF0OEx3UHU4c1JUdGdLUmxOTzRhb21iTDFrNHBITkJnSWVYRzJXSFk1czBjYjhMV0lHT2w1TUNZNk90RUVuV1dzTXJyYXNRMmIxdmlNRnZsWjdGY0dKVnNMZVYxWnBYenZWeXZKeTBhVlBxQk5vT3cxbHI4NnozS3dFNzlmT3ZDT3Y1ZGc2azZWcUVhU1hxa2VmRWlvZnVTY2c4ZFVSbHRYNGhUODNZTGlKVzVxbXJRcmxUbmt1cXVDelhUYWhjZWgxYTMzU3ZvTXdXQXVJT041U1hLcGcyY3ZoWjl1UGJ6RU16akF5U2RhM3hWNUNNT0VQbDA4MUJMTWhLdVNJYlZQUkN2bWJkV1FvdWN4a0k1Y1JPQUhFSEtNbEV6aHdoUmpDTTZWSEliQlBTNGVDTnBoM3RscVZLYkNlWmJ4UHYwMkNRZjRSQXk0d1Q3T3BBNXlMdnI0bVBya1g1dWxZb2NBMjFpT1RHN0kxcG4wb1JTOVRqc0RpVnk2M0dWaWhQWEV5NG9WZHJUbjcxazZIQkJPY2ZyRm9GNWJmb1BGMlZOUmZBQllQNlJNSXlHU2VyT1Y3V1RhdDBoelNwTDE0aGlFNVpVakJ3T3E1UnRPY1o2OUdDV2N2NXMzRG5QRUVIM3JLa2lGNG95TkZjWXgyUW1lVXg1QlNDekd1QTVSVExsd1dGbklSbnBqTHVWMjdTM2xCcmN5cFJHbGkwRVNYSTY1RGxwQXZ0dGJ6Mld1UklyRUxCZk90UGtMVFM2ZEtuMWFvc1dhUFhIMGwxdWNtSkZGZElaV1BZU2dwNjBQdlhLTHlvbTFETjZ4dXF6bkc0b01RWTkyZzJtVHhNU01abDNRcEpnN2VtNG1vNWl1MmUxeUhPTjJzcXNlcHRUQ1BwcG94VkxjYmJUZzV4TGtjNzdMTjZnMkhTeDBHWU1Mc2o4eXQ5cDBsa3Ztc0RqSnJnckJOVHNlZ1ZGUDI4M285eEFkbE44QzZTa1F0NnJWVmVKYnczc0lhTjFWTEt5c3pxOXpFWndmNTdDUTlzNUVzTEZnMkJZVVdpY3NrZmZ2MGZNVEtxN1RvOGFhNU1BMUZsT1RtQ3MxTWNFbWFqOGtCbEI3SldJeVRFMG1pQ1R5aEhmTzQwOGJoZTBpMFdMSmthQWFmOEdCQW5WajFzZ3FFT200UzExa0w1b1lZc1Bxb2tibzdPaFpJNkJzekFySTJUSzFFMVZITGZKQU9NZDdxQmsxY3Vra2xadUxlZWJaSEVOM2lrZjhJNkNCcVNQcmRBNlVYTnNVNXdiWUxhTDJiclFKUjVjcDJ5Y3FoS2tWUUpJSUx4aDFxNGlOTFB1aXJ2RGtCZlRrRHM3NTBFRXY1d08zNmhlNm9SdHhXUmx2R2t0VTBGZWh0VW1nYWw5SUVnY29qWXo0UVNVUWtoeXZCdWpZbXdOU0xYQ05lYXlsaUJibDk2Umxib0laRGMzZUZGamdYaEd6YVNzekxiQXdTREh6SWV1ckUyT3pZWjdvNkxiY1FXcTVkaEtWc3c0anFYOWttd2hEY0luckphYXp0YlNsbEFpekk2d0FJOFpkNlpUNDJNRGo3ZWRoSTVnbFpMamV3eU5za294OFdlSDh6M0FXd0JVeldWTjVyNzF5SVJvSG52SlM1NlhicVJzM0ZlOEVGSGRWZmwwUEhZTW53c1RiVmdDYmRrc21ORWM0amFnb041cGxMcmlJMWp6bzZ0N3lrcmI4YUx3ZWJKOVJRMkd1VzI2ejV2M1lKZWxuWFNJTndpRWJCN3FSQ0lNTnFqdURoV3ZxTDgyM3Z5bHNmRE5GVGdlcGFDWU15Umt3a1JycnJDdWpqa1NWUndpUm1ZWGM5TnVlOFBpaTA3WFg5VEc5M2M5Qk9LZ09WVkpCWVJHck9rY0I3SXR5ZnF5REJrWUFqeWhoRWk2ZkM0QmxrQ2JmUjZXdlVZdXo0Z0NvUmNEMlM2TThVRlRoTG92TVJlT1BOamNoU2c3dzZOZ3B2bE1ReGRuZGpkM3FEczJORlR0c1V6bnQ1Y2x2TzVyc2RGaFhURDE3UHFiZlFDdGdGNmpBcTNrM2JMSU55cUNCb3VUdlhZUUM5VjRqeFZZRkVRR0tzRXV4VzZIVlp4Y1dKTlNPc2lzWXZkS2ZhN0FENEVsWlhRTTgzeGh0UmhGd0phV0w1bHVzeEZ2dWVBTFZQcEVBU2xpT0ZmR1VVeFNBN0VGT1JvQm9FZ0FCY2lUdlRZOTJyN3U4bXIzV2s3MUc0aGdab1A4cEVrYkRja2tlaW1HQk9SZDlXbUVhREVYbjJ2VVpIeEczbjR0VWdvcU05OXZNd2xoUUc0Uk5CY1ZRSEJVSUx4enhhYnF5cDRYbERVWmFNVnJYSm04TUxvMWFaSHUxV3A0ZUVraldHekR0VE1pc1BVRk93ekgxdzBQemdzbUxwcjVrVFNlNkZxaTBTWHIzb2FzVE5KMzdld0pGcmczSlRqTllBRmtOQ044UTRFUEo1VGh6dXozcE5keEJ0QTRpOE14bGtseEZhOUtacXVabExBNzhxcEprbVV0anczZTk5M2Flc1NIeFYwMTlzOXlER0lJN0tmME5jVEhKc1N1bW9YTGtiQ3pVTUpvTm1CWFFtcWp3Zm1xVFAyVmp4dWpUYVduZUN5UnBhZGgzZlduS1Z4am1JOEluc3FKREF1OXJRRGVPQjE0REo2aFJjTkZPVXR4SnlwN3Vkb2FJNDg0NWlJODVla3FJd2JORzVpQzVxN0Vjc3paUmFkTEsxNlMzWXJ0M1NNMEZabTh3d2Zld1BoQjRxSTN1cjZRN01iQlFkOGpuYnN6bDltQkxUQ1NtWWw1a3VYeUtWR1B6NmFJVTdOUXh2SFdkdVBLejBnZXdSeGJTbWd3ZUZDR3VmeVgzZ1hncnhpN1hRdWhpWmE1ZkM0QXNQY1NrcHRWc1dxRkVaTGNWRFNHT1I5MUd6VzdaTkszMWNwUHczR25oRzZQZDVHaXZKa1N4QktPSEV3SWs5Z0tSU3c3RlhWaDZ3TjNieVQwQk53TXZRRzhVV2Y0Vm9zU0xlZHJ0SlNVNVZaYldTbkc1SFQyYVpXM1Q0R1FhWmw4SmQ3dWxzU0ZjaDdRZUZ2NWdUNGVISGFQdk10UHRKa0t0VXhGazNrTk1UOTBqSDNhUXJuU200TjNtVUVYVnpUd1E3bHNOeENLdG4zV05ZNU5JdGZ5cWdRNEt5Vmp0NlhKQnhzSFNhOTRFbGxmQVI1cDhhTkg2UXBBS0dJS3BiM25lcGhvdjdweXdrN2lkNmRJdlFmMVpCdTZ6VFFBd2NvMzdQTXdJaWNZYmFYUTVFdFp3U3JUMjY3TjdkSURtYlFTV29HaWNtcFE4ak9YN1M5UEdpUTZ5NzN5Vlh2QmJVaVE0VXVqaVNuZHdYV3h5OGVhbEdiMkJVSlhVcFgwQnhwbUVLTkhmNHowOHBNYWN2MWJCNk9pc29GTHJtbWFUTlNEY1dlcnlKSG5Cb3ZEUFkxdnc4TVppQlZZUXpvU29rWWVpR2ZiUlZyYzVpQjNPMUd6NUJ4MFhMdmZyV3NreDRUMzdSYjNKMkdscHM2ZUIwMkZyejNlR1RuQjhvQzdXaHdQYXN6SnoxTVhDM3NDV0RXN2x0cU90NHFjUmhvT0dhTnFXUlllSGxDczBLNU96YVpkeUFSZThEOWZFVTF1OW96ZHAwdjRsSlJaS3E0eDB3T0RvcG5kWEpHMWN6bUlSbHlJSVp2cElFaFdpaHlIZTFXdElDdVVMbXR5cnJyQmFLS1ZLSGVadG9OY0I5Y05scDQ3WDRtVWg2d214VkJ2M253NmxFUTVVVTFOVk9sSk15TjAwWXRxeWZjMHMzcVU2VzNEMkdmY2YyUHVJUTl2ODBOem5oanVQRG95S0tEaFNaMmRWYzlqcERJNmZnRzB0SWdYYlpoMU8zbzJ5b2t0RzRHUWpuZWtNcHZuY09UZmZZMHlCTzJJQU04d2JhUFpsTXVpTDNyVVJ3RVk3SnhLblBhUTJhWGpIeWtuUEJjZXFwcDFtSzJYdXZEWG5hZ1o2dUk5VzFTSGJ3b0c5MEtoWVJjdlgxU2FVNWdGbzNCWEhMTFluTUZicUFONVlkV1pmWnZ1cjFIWG10Z0RJUXR2WWtvUDV4a0swbUpBZDk5NHpDVzhBck92RVo0MXBHYlFLVUtqU1VZQW9wUGFiNG1xRHFhUUhhMjdXQ0Q3ZkJMa1Y3UHpXUko5Q25zejlwNzZyT1c4Uk04dVJHSlJ0ZzRWRGVNYWFtYVVuVThVRXpSRjFHOEpJV3YxNkkxQ2VOV2ZhRllUUkpTQXJKSERxZ053SFV2UUNYNUNXZ2RlOW1LdG05S0x6b256OEJKVU93akJsV0NFYkcxUE1qbkpkZU4xTGpzMmdHUE9ad25Dc3VXZTl3TDlVYjU0cWplSlc1c1JBb09HNTR3SWtMeVZJSE1yeXVhZ0lVYjVyV0ZtU2ZrQ1ZidnJ2NDQwQjJzSFlMUmpqY1hlR3gyRHNkT1NOZVVRcDMzQUl5UmpZdTRJYmpvMWxYSlNITWt3SFYwUmJla2lhcXlLUDk1Q3FEUE82ZXpIMkZWWTJSdU9xV2RGcDdFdG5seEI5a3ROelJRS2ZPaHhqUVhPY0hDYlhMaVIxRFRmQVdCTlE3SDVtRzExWHhSM3RvcE5wRWdoN1NSQWptb2w1OHF0ZE12ejBxUVJhMG92blFEbkRjYUtmM0E1dWswcmtkYk9xUzdGSkt0UlZPbmdINjZMN0h2b3RxMnNTS2R6TUlGWURCSEptWk05NW9UY1lVUFltM2tDemRVSWtxUE9NaVlJVUlySnZNd1pBTjZqTE5FeDk4RUkwVDBab2x0Ymxidzgxb2RIbVI0djN3V1lxNVlVSFg0Z01abW5SSmRhT3FrYTZtWEN1Q3pCbnNnVE5RcjM3M0FyRko3MndnOWdvRWlJdEdyUm1DYk5la0pxQzNEZ2JGSDkyY3VTTUJHeFRqaDAyU2tyeHRHTjBwOGcxT3RyZ2NVSHB4MjFydTcxVVo1d2hkaGk="
                    data-rules="{&quot;randomToken&quot;:[],&quot;name&quot;:{&quot;required&quot;:true,&quot;minlength&quot;:3},&quot;email&quot;:{&quot;required&quot;:true,&quot;maxlength&quot;:200,&quot;minlength&quot;:3,&quot;email&quot;:true},&quot;message&quot;:{&quot;required&quot;:true}}">
                    @csrf
                    <div class="form-col hidden-field">
                        <input type="hidden" name="randomToken" value="845064b7-5989-4b0a-938e-dec0f7313ef7">
                    </div>
                    <div class="form-col">
                        <label for="name">
                            <span>{{trans('home.name')}}</span>
                        </label>
                        <input type="text" name="name" id="name" placeholder="John Doe" required>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="alert alert-error"><span>Please enter a valid name.</span></div>
                    </div>
                    <div class="form-col">
                        <label for="email">
                            <span>{{trans('home.email')}}</span>
                        </label>
                        <input type="email" name="email" id="email" placeholder="your@email.com" required>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="alert alert-error"><span>Please enter a valid email address.</span></div>
                    </div>
                    <div class="form-col">
                        <label for="message">
                            <span>{{trans('home.message')}}</span>
                        </label>
                        <textarea name="message" id="message" required></textarea>
                        @error('message')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="alert alert-error"><span>Please enter a message.</span></div>
                    </div>
                    <div class="form-col form-col-btn">
                        <div class="btn btn-normal">
                            <div class="btn-click">
                                <div class="btn-fill btn-original-fill"></div>
                                <div class="btn-text btn-original-text">
                                <span>{{trans('home.Send Form')}}</span>
                                </div>
                                <div class="btn-fill btn-duplicate-fill"></div>
                                <div class="btn-text btn-duplicate-text">
                                <span>{{trans('home.Send Form')}}</span>
                                </div>
                                <input type="submit" value="Submit">
                            </div>
                        </div>
                        <p><span class="reply">{{trans('home.We typically reply within 30 min!')}}</span></p>
                    </div>
                    <p data-success="true" style="display:none">{{trans('home.Form succesfully sent.')}}</p>
                    </form>
                </div>
            </div>
        </div>
    </header>
    @if(count($addresses) > 0)
        <section class="section theme-dark contact-locations" data-scroll-section>
            <div class="container">
                <div class="row">
                    @foreach($addresses as $address)
                        <div class="flex-col">
                            <div class="col thumb-col">
                            <div class="thumb">
                                <div class="overlay overlay-image">
                                    <img class="overlay single-image lazy"
                                        src="{{asset('uploads/addresses/' . $address->image)}}"
                                        data-src="https://www.basecreate.com/media/site/35dfa3aa26-1676519491/basecreative-contact-hong-kong-low-1080x-q72.jpg"
                                        width="600" height="454" data-sizes="100w" alt="Image">
                                </div>
                            </div>
                            </div>
                            <div class="col title-col">
                            <h3>{{$address->{'country_' . $lang} }}</strong></h3>
                            </div>
                        </div>
                        <div class="flex-col">
                            <div class="col address-col">
                            <p class="address">
                                <strong>{{$address->{'name_' . $lang} }}</strong>
                                <span>{{$address->{'address_' . $lang} }}</span>
                            </p>
                            <p>
                                <a href="{{$address->map_url}}" target="_blank">{{trans('home.Google Maps')}}</a>
                            </p>
                            </div>
                            <div class="col contact-col">
                            <p class="phone">
                                <a href="tel:{{$address->phone}}">{{$address->phone}}</a>
                            </p>

                            <p>
                                <a href="mailto:{{$address->email}}">{{$address->email}}</a>
                            </p>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection