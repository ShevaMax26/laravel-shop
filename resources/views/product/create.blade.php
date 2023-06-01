@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Products</li>
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
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control mb-3" placeholder="Name" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" class="form-control mb-3" placeholder="Description" value="{{ old('description') }}">
                        </div>
                        <div class="form-group">
                            <textarea name="content" class="form-control mb-3" placeholder="Content" rows="5">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" class="form-control mb-3" placeholder="Price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <input type="number" name="count" class="form-control mb-3" placeholder="Count" value="{{ old('count') }}">
                        </div>
                        <div class="form-group">
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select colors" style="width: 100%;">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('product.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
