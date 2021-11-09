@extends('admin.layouts.app')
@section('title')
    Result show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Ko'rsatgichlar namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.results.index') }}" class="btn btn-block btn-primary btn-sm">
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
                            <td>{{ $result->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $result->getStatus() !!} </td>
                        </tr>
                        <tr>
                            <th>Sarlavha UZ</th>
                            <td>{{ $result->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha EN</th>
                            <td>{{ $result->title_en }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha RU</th>
                            <td>{{ $result->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Soni</th>
                            <td>{{$result->number}}</td>
                        </tr>
                        <tr>
                            <th>Ikonka</th>
                            <td>{!! $result->getIcon('font-size:xxx-large') !!}</td>
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
