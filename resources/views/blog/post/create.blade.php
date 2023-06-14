@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('blog.post.store') }}" method="post" enctype="multipart/form-data" class="w-50">
                        @csrf
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control mb-3" placeholder="Title" value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Content:</label>
                            <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Select category:</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">--}}
{{--                                @foreach($tags as $tag)--}}
{{--                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>Preview Image:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Main Image:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="main_image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('blog.post.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
