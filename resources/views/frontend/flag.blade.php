@extends('frontend.layouts.app')
@section('content')
    <div class="content py-4">
        <div class="container">
            <div class="info_box">
                <h3 class="title mb-5">{{__('words.flag title')}}</h3>
                <img class="mb-3" src="{{asset('frontend/img/png/uzb.png')}}">
                <p class="desc">{{__('words.flag body')}}</p>
            </div>
        </div>
    </div>
    </div>
@endsection
