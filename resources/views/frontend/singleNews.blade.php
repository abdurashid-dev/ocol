@extends('frontend.layouts.app')
@section('content')
    <div class="news_content py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-12 py-3">
                            <img
                                class="news_img"
                                src="{{asset($new->image)}}"
                            />
                        </div>
                        <div class="col-12">
                            <span class="date text-muted mb-1">{{$new->created_at->diffForhumans()}}</span>
                            <h5 class="news_title">{{$new['title_'.session('lang')]}}</h5>
                            <p>{!! $new['content_'.session('lang')] !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 py-3">
                    <h5 class="text-dark mb-3">{{__('words.another news')}}</h5>
                    @foreach($news as $blog)
                        <div class="row mb-3">
                            <div class="col-4">
                                <img
                                    class="news_thumbs"
                                    src="{{asset($blog->image)}}"
                                />
                            </div>
                            <div class="col-8">
                                <a class="text-dark" href="{{route('singleBlog', $blog->id)}}">{{$blog->title_uz}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div
                        class="f_widget social-widget pl_70 wow fadeInLeft"
                        data-wow-delay="0.8s"
                        style="
                visibility: visible;
                animation-delay: 0.8s;
                animation-name: fadeInLeft;
              "
                    >
                        <div class="f_social_icon">
                            @foreach($socials as $social)
                                <a href="{{$social->link}}"><i class="{{$social->icon}} mr-1"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
