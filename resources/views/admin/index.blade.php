@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$news->count()}}</h3>

                    <p>Yangiliklar</p>
                </div>
                <div class="icon">
                    <i class="far fa-newspaper"></i>
                </div>
                <a href="{{route('admin.blogs.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$result->count()}}</h3>

                    <p>Ko'rsatgichlar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('admin.results.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$links->count()}}</h3>

                    <p>Foydali linklar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-link"></i>
                </div>
                <a href="{{route('admin.links.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$sliders->count()}}</h3>

                    <p>Slayderlar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-sliders-h"></i>
{{--                    <i class="bi bi-sliders"></i>--}}
{{--                    <i class="ion ion-pie-graph"></i>--}}
                </div>
                <a href="{{route('admin.sliders.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
@endsection
