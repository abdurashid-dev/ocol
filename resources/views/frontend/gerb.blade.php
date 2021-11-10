@extends('frontend.layouts.app')
@section('content')
    <div class="content py-4">
        <div class="container">
            <div class="info_box">
                <h3 class="title mb-5">{{__('words.gerb title')}}</h3>
                <img class="mb-3" src="{{asset('frontend/img/png/gerb.gif')}}">
                <p class="desc">{{__('words.gerb body')}}</p>
            </div>
        </div>
    </div>
    </div>
@endsection
