@extends('admin.layouts.app')
@section('title')
    About show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Ma'lumotlar namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.about.index') }}" class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-arrow-left"></i> Orqaga
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th>#</th>
                            <td>{{ $about->id }}</td>
                        </tr>
                        <tr>
                            <th>Sarlovha UZ</th>
                            <td>{{ $about->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Sarlovha EN</th>
                            <td>{{ $about->title_en }}</td>
                        </tr>
                        <tr>
                            <th>Sarlovha RU</th>
                            <td>{{ $about->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Ma'lumot UZ</th>
                            <td>
                                {!! $about->body_uz !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Ma'lumot RU</th>
                            <td>
                                {!! $about->body_ru !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Ma'lumot EN</th>
                            <td>
                                {!! $about->body_en !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Rasm</th>
                            <td>{!! $about->getBlogImage('width:200px') !!}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
