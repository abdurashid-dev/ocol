@extends('admin.layouts.app')
@section('title')
    About Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.about.index') }}" class="btn btn-block btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ma'lumot tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.about.update', $about->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="title_uz">Title UZ</label>
                            <input type="text" required class="form-control" name="title_uz" value="{{$about->title_uz}}"
                                   placeholder="Enter Title UZ">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title_en">Title EN</label>
                            <input type="text" required class="form-control" name="title_en" value="{{$about->title_en}}"
                                   placeholder="Enter Title EN">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title_ru">Title RU</label>
                            <input type="text" required class="form-control" name="title_ru" value="{{$about->title_ru}}"
                                   placeholder="Enter Title RU">
                        </div>
                        <div class="form-group">
                            <label for="youtube">You tube link</label>
                            <input type="text" required class="form-control" name="youtube"
                                   placeholder="You tube link" value="{{$about->youtube}}">
                        </div>
                        @error ('youtube')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group mb-3">
                            <label>Cover Image 1920x1080(recommended)</label>
                            <div>
                                {!! $about->getBlogImage() !!}
                            </div>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <label for="floatingTextarea2">Ma'lumot Uz</label>
                        <div class="form-floating">
                            <textarea id="noImage1" class="form-control" name="body_uz" required
                                      placeholder="Ma'lumot (uz)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$about->body_uz}}</textarea>
                            @error ('body_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2">Ma'lumot En</label>
                        <div class="form-floating mt-3">
                            <textarea id="noImage2" class="form-control" name="body_en" required
                                      placeholder="Ma'lumot (en)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$about->body_en}}</textarea>
                            @error ('body_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2">Ma'lumot Ru</label>
                        <div class="form-floating mt-3">
                            <textarea id="noImage3" class="form-control" name="body_ru" required
                                      placeholder="Ma'lumot (ru)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$about->body_ru}}</textarea>
                            @error ('body_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('../../plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
            $("#noImage3").summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // [ 'table', [ 'table' ] ],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
            $("#noImage1").summernote({
                height: 300,
                lang: 'uz-UZ',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // [ 'table', [ 'table' ] ],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
            $("#noImage2").summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // [ 'table', [ 'table' ] ],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
        })
    </script>
@endsection

