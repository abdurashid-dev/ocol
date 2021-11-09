@extends('admin.layouts.app')
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
@endsection
@section('title')
    Blogs
@endsection
@section('content')
    <!-- Create -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yangilik qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Kategoriya</label>
                                <select name="category_id" class="form-select mb-3">
                                    <option disabled selected>Ushbu tanlash menyusini oching</option>
                                    @if($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name_uz}}</option>
                                        @endforeach
                                    @else
                                        <option disabled selected>Kategoriyalar mavjud emas</option>
                                    @endif
                                </select>
                                @error ('category_id')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title_uz">Sarlovha UZ</label>
                                <input type="text" required class="form-control" name="title_uz"
                                       placeholder="Sarlovha (uz)ni kiriting" value="{{old('title_uz')}}">
                            </div>
                            @error ('title_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="title_en">Sarlovha EN</label>
                                <input type="text" required class="form-control" name="title_en"
                                       placeholder="Sarlovha (en)ni kiriting" value="{{old('title_en')}}">
                            </div>
                            @error ('title_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="title_ru">Sarlovha RU</label>
                                <input type="text" required class="form-control" name="title_ru"
                                       placeholder="Sarlovha (ru)ni kiriting" value="{{old('title_ru')}}">
                            </div>
                            @error ('title_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group mt-3">
                                <label>Rasm 1920x1080(tavsiya etiladi)</label>
                                <input type="file" required class="form-control" name="image">
                            </div>
                            @error ('image')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <label for="floatingTextarea2">Ma'lumot Uz</label>
                            <div class="form-floating">
                                <textarea id="noImage1" class="form-control" name="content_uz" required
                                          style="height: 100px">{{old('content_uz')}}</textarea>
                                @error ('content_uz')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2">Ma'lumot En</label>
                            <div class="form-floating mt-3">
                                <textarea id="noImage2" class="form-control" name="content_en" required
                                          style="height: 100px">{{old('content_en')}}</textarea>
                                @error ('content_en')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2">Ma'lumot Ru</label>
                            <div class="form-floating mt-3">
                                <textarea id="noImage3" class="form-control" name="content_ru" required
                                          style="height: 100px">{{old('content_ru')}}</textarea>
                                @error ('content_ru')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    {{--end form--}}
                </div>

            </div>
        </div>
    </div>
    {{--    End Create--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <h3 class="card-title">Yangiliklar</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Qo'shish
                            </a>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Sarlavha UZ</th>
                            {{-- <th>Name EN</th> --}}
                            <th>Rasm</th>
                            <th>Holati</th>
                            <th>Harakatlar</th>
                        </tr>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $blog->title_uz }}</td>
                                <td>
                                    {!! $blog->getBlogImage() !!}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('admin.activation', ['id'=>$blog->id])}}" method="POST">
                                            <input type="hidden" name="type" value="status">
                                            @csrf
                                            {!! $blog->getStatusBadge() !!}
                                        </form>
                                    </div>
                                </td>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.blogs.show', $blog->id) }}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.blogs.destroy',$blog->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                                    type="submit" class="btn btn-danger btn-flat"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        {{$blogs->links()}}
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('../../plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            let options = {
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
            };

            $("#noImage3").summernote(options);
            $("#noImage1").summernote(options);
            $("#noImage2").summernote(options);
        })

    </script>
    @if( session()->has('inactive') )
        <script>
            toastr.warning('{{ session()->get('inactive') }}');
        </script>
    @endif
@endsection
