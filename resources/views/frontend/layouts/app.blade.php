<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{asset('frontend/css/fa/css/all.min.css')}}" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.3/dist/jquery.fancybox.min.css"
    />
    <link rel="stylesheet" href="{{asset('frontend/css/stellarnav.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}" />
    <title>O'zbekiston Respublikasi Davlat</title>
</head>

<body>
<div class="bg_dark"></div>

<div class="loader_wrapper">
    <div class="loader"></div>
</div>

<span class="anim01"></span>
<span class="anim02"></span>
<span class="anim03"></span>
<span class="anim04"></span>

<div class="modal_fullscreen"></div>
<div class="goTop">
    <i class="far fa-arrow-alt-circle-up"></i>
</div>
<div class="search_input">
    <form>
        <input type="text" class="form-control"/>
        <button class="search_btn" type="submit">{{__('words.search')}}</button>
        <i class="fas fa-times text-dark close_icon"></i>
    </form>
</div>
<div class="accessibility_menu">
    <div class="container">
        <div class="accessibility_wrapper">
            <div class="font_size accessibility_item">
                <span>{{__('words.font size')}}</span>
                <div class="buttons">
                    <button class="small_size">A-</button>
                    <button class="normal_size">A</button>
                    <button class="high_size">A+</button>
                </div>
            </div>
            <div class="color_system accessibility_item">
                <span>{{__('words.system color')}}</span>
                <div class="buttons">
                    <button class="grayscale">A</button>
                    <button class="invert">A</button>
                    <button class="contrast">A</button>
                </div>
            </div>
            <button class="reset accessibility_item">{{__('words.simple')}}</button>
            <i class="fas fa-times text-dark close_icon"></i>
        </div>
    </div>
</div>
<header class="section">
    <div class="header_top paddingX py-1 headline">
        <div
            class="
            container-fluid
            d-flex
            justify-content-between
            align-items-center
          "
        >
        <div class="links">
            <a href="{{route('flag')}}" class="wow link d-none d-sm-block">
                <img src="{{asset('frontend/img/png/uzb.png')}}"/>
                <span>{{__('words.the flag')}}</span>
            </a>
            <a href="{{route('gerb')}}" class="wow link d-none d-sm-block">
                <img src="{{asset('frontend/img/png/gerb.gif')}}"/>
                <span>{{__('words.gerb')}}</span>
            </a>
            <a href="{{route('madhiya')}}" class="wow link d-none d-sm-block">
                <img src="{{asset('frontend/img/png/madhiya.png')}}"/>
                <span>{{__('words.anthem')}}</span>
            </a>
            <a href="#" class="wow link accessibility">
                <i class="fas fa-eye"
                ><span class="d-none d-sm-block"
                    >&nbsp; {{__('words.blind')}}</span
                    ></i
                >
            </a>
            <a href="#" class="wow link">
                <span class="search" title="{{__('words.search')}}"></span>
            </a>
        </div>
                <div class="langs">
                    <a href="{{route('lang', 'uz')}}" class="uzb wow lang">
                        <img src="{{asset('frontend/img/png/uzb.png')}}"/>
                        <span>Uzb</span>
                    </a>
                    <a href="{{route('lang', 'ru')}}" class="rus wow lang">
                        <img src="{{asset('frontend/img/png/rus.png')}}"/>
                        <span>Рус</span>
                    </a>
                    <a href="{{route('lang', 'en')}}" class="eng wow lang">
                        <img src="{{asset('frontend/img/png/eng.png')}}"/>
                        <span>Eng</span>
                    </a>
                </div>
        </div>
    </div>
    <div class="header_info paddingX py-1 headline">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-4">
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('frontend/img/png/gerb.gif')}}" height="60px" style="margin: 10px"/>
                        <span>{{$text['name_'.session('lang')]}}</span
                        >
                    </a>
                </div>
                <div class="col-xl-8">
                    <div class="info_block row">
                        <div class="col-lg-4">
                            <a href="tel:{{$text->number}}" class="info_item">
                                <i class="fas fa-phone-alt"></i>
                                <div class="wrap_item">
                                    <span class="phone">{{$text->number}}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 d-none d-sm-block">
                            <div class="info_item">
                                <i class="fas fa-box"></i>
                                <div class="wrap_item">
                                    <a href="mailto:{{$text->email}}" class="email"
                                    >{{$text->email}}</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info_item social">
                                @foreach($socials as $social)
                                    <a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="stellarnav paddingX headline">
        <ul>
            <li><a href="{{route('blog')}}">{{__('words.news')}}</a></li>
            <li><a href="{{route('about')}}">{{__('words.about')}}</a></li>
            <li><a href="{{route('image')}}">{{__('words.gallery')}}</a></li>
            <li><a href="{{route('contact')}}">{{__('words.contact')}}</a></li>
        </ul>
</div>

@yield('content')

<div class="wow services paddingX py-5">
    <span class="title wow">{{__('words.useful links')}}</span>
    <div class="container-fluid">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                @foreach($links as $link)
                <div class="swiper-slide">
                    <i class="{{$link->icon}}"></i>
                    <a href="#" class="service_title"
                    >{{$link['title_'.session('lang')]}}</a
                    >
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="row paddingX items">
        <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">s
            <a href="{{route('home')}}" class="logo">
                <img src="{{asset('frontend/img/png/gerb.gif')}}" height="40px" style="margin: 10px" alt="logo"/>
                <span>{{$text['name_'.session('lang')]}}</span>
            </a>
            <div class="social">
                @foreach($socials as $social)
                    <a href="{{$social->link}}" class="{{$social->icon}}"></a>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
            <span class="sub_title">Menu</span>
            <ul>
                <li><a href="{{route('blog')}}">{{__('words.news')}}</a></li>
                <li><a href="{{route('about')}}">{{__('words.about')}}</a></li>
                <li><a href="{{route('image')}}">{{__('words.gallery')}}</a></li>
                <li><a href="{{route('contact')}}">{{__('words.contact')}}</a></li>
            </ul>
        </div>
        <div class="col-12 col-md-6 col-lg-12 col-xl-4">
            <span class="sub_title">{{__('words.contact')}}</span>
            <div class="contacts">
                <div class="contacts__item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="wrap">
                <span>{{$text['address_'.session('lang')]}}</span>
              </span>
                </div>
                <a href="tel:{{$text->number}}" class="contacts__item">
                    <i class="fas fa-phone-alt"></i>
                    <span>{{$text->number}}</span>
                </a>
                <a href="mailto:{{$text->email}}" class="contacts__item">
                    <i class="fas fa-mail-bulk"></i>
                    <span>{{$text->email}}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48628.95034719378!2d71.75544211991246!3d40.37983490223694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb83431937abc5%3A0xcfa4d876b34e7bbc!2z0KTQtdGA0LPQsNC90LAsINCj0LfQsdC10LrQuNGB0YLQsNC9!5e0!3m2!1sru!2s!4v1635587830140!5m2!1sru!2s"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
        ></iframe>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.3/dist/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.9/scrollreveal.min.js"></script>
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/js/stellarnav.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
@yield('script')
</body>
</html>
