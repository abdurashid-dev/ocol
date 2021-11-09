@extends('frontend.layouts.app')
@section('content')
    <div class="news_section section paddingX py-5">
        <div class="container-fluid">
            <span class="title wow">{{__('words.news')}}</span>
            <div class="wrapper row">
                @foreach($news as $new)
                    <div class="col-md-6 col-12 col-xl-4 mb-4">
                    <div class="news_item">
                        <div class="news_item swiper-slide">
                            <div class="date_news">
                                <i class="far fa-calendar-alt"></i>
                                <span class="date">{{$new->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="news_img">
                                <img src="{{$new->image}}" />
                            </div>
                            <span class="news_title">{{$new['title_'.session('lang')]}}</span
                            >
                            <span class="news_description"
                            >{{$new['content_'.session('lang')]}}</span
                            >
                            <a href="{{route('singleBlog', $new->id)}}" class="nd_btn"
                            ><span>Read More</span></a
                            >
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        {{$news->links('frontend.layouts.pagination')}}
        </div>
    </div>
@endsection
