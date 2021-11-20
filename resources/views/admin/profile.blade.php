@extends('admin.layouts.app')
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')
    Profil
@endsection

@section('content')
<!-- Modal -->
    <div class="modal fade" id="exampleModalPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Parolni o'zgartirish</h5>
                    <button type="button" class="btn-close closeBtn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.password')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="errors"></div>
                            <label for="name">Eski parol</label>
                            <input  type="password" required class="form-control old_password" name="old_password"
                                    placeholder="Eski parolni kiriting" value="{{old('old_password')}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Yangi parol</label>
                            <input  type="password" required class="form-control password" name="password"
                                    placeholder="Yangi parolni kiriting" value="{{old('password')}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Yangi parol</label>
                            <input  type="password" required class="form-control password_confirmation" name="password_confirmation"
                                    placeholder="Parolni qaytadan kiriting" value="{{old('password_confirmation')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeBtn" data-bs-dismiss="modal">Yopish</button>
                        <button type="submit" class="btn btn-primary savePass">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ma'lumotlarni o'zgartirish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.data')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">IFO</label>
                            <input  type="text" required class="form-control" name="name"
                                    placeholder="Ismingni kiriting" value="{{$user->name}}">
                            @error ('name')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input  type="email" required class="form-control" name="email"
                                    placeholder="Elektron pochtangizni kiriting" value="{{$user->email}}">
                            @error ('email')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Small boxes (Stat box) -->
    <div class="d-flex align-items-center justify-content-center">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>FIO</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalPassword">
                            Parolni o'zgartirish
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalData">
                            Ma'lumotlarni o'zgartirish
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->



@endsection
@section('script')
@if(session()->has('messageError'))
<script>
    toastr.error('{{ session()->get('messageError') }}');
</script>
@endif
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.closeBtn').click(function() {
        $('.errors').html(' ');
        $('.old_password').val('')
        $('.password').val('')
        $('.password_confirmation').val('')
        $('#exampleModalPassword').modal('hide');
    });
    $('.savePass').click(function (e) {
        e.preventDefault();
        let data = {
            'old_password': $('.old_password').val(),
            'password': $('.password').val(),
            'password_confirmation': $('.password_confirmation').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/admin/changePassword",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.status == "validation") {
                    // alert('validation errors');
                    $('.errors').html(' ');
                    $('.errors').addClass('alert alert-danger')
                    $.each(response.error, function (key, error_val) {
                        $('.errors').append('<li>'+error_val+'</li>');

                    });
                    $('.old_password').val('')
                    $('.password').val('')
                    $('.password_confirmation').val('')
                }
                if(response.status == "done"){
                    Swal.fire(
                        response.message+' Profilingizga qaytadan kiring!',
                    )
                    $('.old_password').val('')
                    $('.password').val('')
                    $('.password_confirmation').val('')
                    $('#exampleModalPassword').modal('hide');
                    setTimeout(function(){
                        swal.close();
                        $('#logout-form').submit();
                    }, 3000);

                }
                if(response.status == "check"){
                    $('.errors').html(' ');
                    $('.errors').addClass('alert alert-danger')
                    $('.errors').html(response.error);
                    $('.old_password').val('')
                }
            }
        });

    });
</script>
@endsection

