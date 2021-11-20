@extends('frontend.layouts.app')
@section('content')
    <div class="wrapper header_slider loading">
        <main>
            <div class="slideshow">
                <div class="slides">
                    @foreach($sliders as $key => $slider)
                        <div class="slide {{$key == 0 ? "slide--current" : ''}}">
                            <div
                                class="slide__img"
                                style="background-image: url({{asset($slider->image)}});background-position: top">
                            </div>
                            <h2 class="slide__title">{{$slider['title_'.session('lang')]}}</h2>
                            <p class="slide__desc">{{$slider['body_'.session('lang')]}}</p>
                            <a class="slide__link" href="{{$slider->link}}">{{__('words.read more')}}</a>
                        </div>
                    @endforeach
                </div>
                <nav class="slidenav">
                    <button class="slidenav__item slidenav__item--prev">
                        <i class="fas fa-angle-left"></i>
                    </button>
                    <button class="slidenav__item slidenav__item--next">
                        <i class="fas fa-angle-right"></i>
                    </button>
                </nav>
            </div>
        </main>
    </div>
    <div class="news paddingX py-5">
        <div class="container-fluid">
            <span class="title wow">{{__('words.news')}}</span>
            <div class="news_block swiper-container">
                <div class="swiper-wrapper">
                    @foreach($news as $new)
                        <div class="news_item swiper-slide">
                            <div class="date_news">
                                <i class="far fa-calendar-alt"></i>
                                <span class="date">{{$new->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="news_img">
                                <img src="{{$new->image}}"/>
                            </div>
                            <span class="news_title"
                            >{{$new['title_'.session('lang')]}}</span
                            >
                            <a href="{{route('singleBlog', $new->id)}}" class="nd_btn"
                            ><span>{{__('words.read more')}}</span></a
                            >
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="{{route('blog')}}" class="st_btn">
            <span>{{__('words.more')}}</span>
        </a>
    </div>
    <div class="photogallery paddingX">
        <span class="title wow">{{__('words.gallery')}}</span>
        <div class="wrapper" id="gallery-container">
            @foreach($images as $image)
                <figure class="photogallery__item">
                    <a
                        data-fancybox="images"
                        href="{{$image->image}}"
                    >
                        <img class="img-fluid" src="{{$image->image}}"/>
                        <i class="fa fa-camera"></i>
                    </a>
                </figure>
            @endforeach
        </div>
        <a href="{{route('image')}}" class="st_btn">
            <span>{{__('words.see all')}}</span>
        </a>
    </div>
    <div class="counter_section paddingX py-5">
        <span class="title wow">{{__('words.indicators')}}</span>
        <div class="counter_wrapper">
            @foreach($results as $result)
                <div class="wow item_counter">
                    <i class="{{$result->icon}}"></i>
                    <span class="counter_title">{{$result['title_'.session('lang')]}}</span>
                    <span class="counter">{{$result->number}}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('frontend/js/headerSlider.js')}}"></script>
@endsection
