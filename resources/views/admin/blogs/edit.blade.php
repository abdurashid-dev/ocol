@extends('admin.layouts.app')
@section('title')
    Blog Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.blogs.index') }}" class="btn btn-block btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Yangilikni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_ru">Kategoriya</label>
                            <select name="category_id" class="form-select">
                                <option
                                    disabled>
                                    Open this select menu
                                </option>
                                @foreach ($categories as $category)
                                    <option
                                        @php
                                            if($category->id == $blog->category_id){
                                                echo "selected";
                                            }
                                        @endphp
                                        value="{{$category->id}}">{{$category->name_ru}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error ('category_id')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="title_uz">Title UZ</label>
                            <input type="text" required class="form-control" name="title_uz" value="{{$blog->title_uz}}"
                                   placeholder="Enter Title UZ">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title_en">Title EN</label>
                            <input type="text" required class="form-control" name="title_en" value="{{$blog->title_en}}"
                                   placeholder="Enter Title EN">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title_ru">Title RU</label>
                            <input type="text" required class="form-control" name="title_ru" value="{{$blog->title_ru}}"
                                   placeholder="Enter Title RU">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <input type="checkbox" id="status" value="1"--}}
{{--                                   @if($blog->is_active)--}}
{{--                                   checked--}}
{{--                                   @endif--}}
{{--                                   name="is_active">--}}
{{--                            <label for="status">Faol</label>--}}
{{--                        </div>--}}
{{--                        @error ('is_active')--}}
{{--                        <p class="text-danger">* {{$message}}</p>--}}
{{--                        @enderror--}}
                        <div class="form-group mb-3">
                            <label>Cover Image 1920x1080(recommended)</label>
                            <div>
                                {!! $blog->getBlogImage() !!}
                            </div>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <label for="floatingTextarea2">Ma'lumot Uz</label>
                        <div class="form-floating">
                            <textarea id="noImage1" class="form-control" name="content_uz" required
                                      placeholder="Ma'lumot (uz)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$blog->content_uz}}</textarea>
                            @error ('content_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2">Ma'lumot En</label>
                        <div class="form-floating mt-3">
                            <textarea id="noImage2" class="form-control" name="content_en" required
                                      placeholder="Ma'lumot (en)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$blog->content_en}}</textarea>
                            @error ('content_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2">Ma'lumot Ru</label>
                        <div class="form-floating mt-3">
                            <textarea id="noImage3" class="form-control" name="content_ru" required
                                      placeholder="Ma'lumot (ru)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$blog->content_ru}}</textarea>
                            @error ('content_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
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

