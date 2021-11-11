@extends('admin.layouts.app')
@section('title')
    Contact show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Xabar namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.contact.index') }}" class="btn btn-block btn-primary btn-sm">
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
                            <td>{{ $contact->id }}</td>
                        </tr>
                        <tr>
                            <th>Ism</th>
                            <td>
                                {{ $contact->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>Nomer</th>
                            <td>{{ $contact->phone }}</td>
                        </tr>
                        <tr>
                            <th>Viloyat</th>
                            <td>{{ $contact->province }}</td>
                        </tr>
                        <tr>
                            <th>Xabar</th>
                            <td>
                                {{ $contact->sms }}
                            </td>
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
