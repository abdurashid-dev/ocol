@extends('frontend.layouts.app')
@section('content')
    <div class="content py-4">
        <div class="container">
            <div class="about">
                <h1 class="text-center">{{$about['title_'.session('lang')]}}</h1>
                <div class="row">
                    <div class="col-md-12">
                        {!! $about->getBlogImage('width: 100%') !!}
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        {!! $about['body_'.session('lang')] !!}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        {!! $about->youtube !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
