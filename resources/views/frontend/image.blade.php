@extends('frontend.layouts.app')
@section('content')
    <div class="photogallery_section section paddingX py-5">
        <div class="container-fluid">
            <span class="title wow">{{__('words.gallery')}}</span>
            <div class="photogallery">
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
            </div>
            {{$images->links('frontend.layouts.pagination')}}
        </div>
    </div>
@endsection
