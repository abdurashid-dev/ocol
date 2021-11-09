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
                                style="background-image: url({{asset($slider->image)}});">
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
                            <span class="news_description"
                            >{{$new['content_'.session('lang')]}}</span
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
        <a href="#" class="st_btn">
            <span>{{__('words.see all')}}</span>
        </a>
    </div>
    <div class="counter_section paddingX py-5">
        <span class="title wow">{{__('words.indicators')}}</span>
        <div class="counter_wrapper row">
            @foreach($results as $result)
                <div class="col-xl-3 col-lg-6 col-md-12 m-0">
                    <div class="wow item_counter">
                        <i class="{{$result->icon}}"></i>
                        <span class="counter_title">{{$result['title_'.session('lang')]}}</span>
                        <span class="counter">{{$result->number}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>
        function debounce(func, wait, immediate) {
            var timeout;
            return function () {
                var context = this,
                    args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        }
        class Slideshow {
            constructor(el) {
                this.DOM = {};
                this.DOM.el = el;
                this.settings = {
                    animation: {
                        slides: {
                            duration: 300,
                            easing: 'easeOutQuint',
                        },
                        shape: {
                            duration: 300,
                            easing: { in: 'easeOutQuint', out: 'easeOutQuad' },
                        },
                    },
                    frameFill: '#f1f1f1',
                };
                this.init();
            }
            init() {
                this.DOM.slides = Array.from(
                    this.DOM.el.querySelectorAll('.slides > .slide')
                );
                this.slidesTotal = this.DOM.slides.length;
                this.DOM.nav = this.DOM.el.querySelector('.slidenav');
                this.DOM.nextCtrl = this.DOM.nav.querySelector(
                    '.slidenav__item--next'
                );
                this.DOM.prevCtrl = this.DOM.nav.querySelector(
                    '.slidenav__item--prev'
                );
                this.current = 0;
                this.createFrame();
                this.initEvents();
            }
            createFrame() {
                this.rect = this.DOM.el.getBoundingClientRect();
                this.frameSize = this.rect.width / 12;
                this.paths = {
                    initial: this.calculatePath('initial'),
                    final: this.calculatePath('final'),
                };
                this.DOM.svg = document.createElementNS(
                    'http://www.w3.org/2000/svg',
                    'svg'
                );
                this.DOM.svg.setAttribute('class', 'shape');
                this.DOM.svg.setAttribute('width', '100%');
                this.DOM.svg.setAttribute('height', '100%');
                this.DOM.svg.setAttribute(
                    'viewbox',
                    `0 0 ${this.rect.width} ${this.rect.height}`
                );
                this.DOM.svg.innerHTML = `<path fill="${this.settings.frameFill}" d="${this.paths.initial}"/>`;
                this.DOM.el.insertBefore(this.DOM.svg, this.DOM.nav);
                this.DOM.shape = this.DOM.svg.querySelector('path');
            }
            updateFrame() {
                this.paths.initial = this.calculatePath('initial');
                this.paths.final = this.calculatePath('final');
                this.DOM.svg.setAttribute(
                    'viewbox',
                    `0 0 ${this.rect.width} ${this.rect.height}`
                );
                this.DOM.shape.setAttribute(
                    'd',
                    this.isAnimating ? this.paths.final : this.paths.initial
                );
            }
            calculatePath(path = 'initial') {
                return path === 'initial'
                    ? `M 0,0 0,${this.rect.height} ${this.rect.width},${this.rect.height} ${this.rect.width},0 0,0 Z M 0,0 ${this.rect.width},0 ${this.rect.width},${this.rect.height} 0,${this.rect.height} Z`
                    : `M 0,0 0,${this.rect.height} ${this.rect.width},${
                        this.rect.height
                    } ${this.rect.width},0 0,0 Z M ${this.frameSize},${
                        this.frameSize
                    } ${this.rect.width - this.frameSize},${this.frameSize} ${
                        this.rect.width - this.frameSize
                    },${this.rect.height - this.frameSize} ${this.frameSize},${
                        this.rect.height - this.frameSize
                    } Z`;
            }
            initEvents() {
                this.DOM.nextCtrl.addEventListener('click', () =>
                    this.navigate('next')
                );
                this.DOM.prevCtrl.addEventListener('click', () =>
                    this.navigate('prev')
                );

                window.addEventListener(
                    'resize',
                    debounce(() => {
                        this.rect = this.DOM.el.getBoundingClientRect();
                        this.updateFrame();
                    }, 20)
                );

                document.addEventListener('keydown', (ev) => {
                    const keyCode = ev.keyCode || ev.which;
                    if (keyCode === 37) {
                        this.navigate('prev');
                    } else if (keyCode === 39) {
                        this.navigate('next');
                    }
                });
            }
            navigate(dir = 'next') {
                if (this.isAnimating) return false;
                this.isAnimating = true;

                const animateShapeIn = anime({
                    targets: this.DOM.shape,
                    duration: this.settings.animation.shape.duration,
                    easing: this.settings.animation.shape.easing.in,
                    d: this.paths.final,
                });

                const animateSlides = () => {
                    return new Promise((resolve, reject) => {
                        const currentSlide = this.DOM.slides[this.current];
                        anime({
                            targets: currentSlide,
                            duration: this.settings.animation.slides.duration,
                            easing: this.settings.animation.slides.easing,
                            translateX:
                                dir === 'next' ? -1 * this.rect.width : this.rect.width,
                            complete: () => {
                                currentSlide.classList.remove('slide--current');
                                resolve();
                            },
                        });

                        this.current =
                            dir === 'next'
                                ? this.current < this.slidesTotal - 1
                                ? this.current + 1
                                : 0
                                : this.current > 0
                                ? this.current - 1
                                : this.slidesTotal - 1;

                        const newSlide = this.DOM.slides[this.current];
                        newSlide.classList.add('slide--current');
                        anime({
                            targets: newSlide,
                            duration: this.settings.animation.slides.duration,
                            easing: this.settings.animation.slides.easing,
                            translateX: [
                                dir === 'next' ? this.rect.width : -1 * this.rect.width,
                                0,
                            ],
                        });

                        const newSlideImg = newSlide.querySelector('.slide__img');
                        anime.remove(newSlideImg);
                        anime({
                            targets: newSlideImg,
                            duration: this.settings.animation.slides.duration * 4,
                            easing: this.settings.animation.slides.easing,
                            translateX: [dir === 'next' ? 200 : -200, 0],
                        });

                        anime({
                            targets: [
                                newSlide.querySelector('.slide__title'),
                                newSlide.querySelector('.slide__desc'),
                                newSlide.querySelector('.slide__link'),
                            ],
                            duration: this.settings.animation.slides.duration * 2,
                            easing: this.settings.animation.slides.easing,
                            delay: (t, i) => i * 100 + 100,
                            translateX: [dir === 'next' ? 300 : -300, 0],
                            opacity: [0, 1],
                        });
                    });
                };

                const animateShapeOut = () => {
                    anime({
                        targets: this.DOM.shape,
                        duration: this.settings.animation.shape.duration,
                        delay: 150,
                        easing: this.settings.animation.shape.easing.out,
                        d: this.paths.initial,
                        complete: () => (this.isAnimating = false),
                    });
                };

                animateShapeIn.finished.then(animateSlides).then(animateShapeOut);
            }
        }
        new Slideshow(document.querySelector('.slideshow'));
    </script>
@endsection
