@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
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
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" class="w-25">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" class="form-control mb-3" placeholder="Name"
                               value="{{ $product->title }}">

                        @error('title')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" name="description" class="form-control mb-3" placeholder="Description"
                               value="{{ $product->description }}">

                        @error('description')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Content:</label>
                        <textarea name="content" class="form-control mb-3" placeholder="Content"
                                  rows="5">{{ $product->content }}</textarea>

                        @error('content')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="number" name="price" class="form-control mb-3" placeholder="Price"
                               value="{{ $product->price }}">

                        @error('price')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Old Price:</label>
                        <input type="number" name="old_price" class="form-control mb-3" placeholder="Old price"
                               value="{{ $product->old_price }}">

                        @error('old_price')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Count:</label>
                        <input type="number" name="count" class="form-control mb-3" placeholder="Count"
                               value="{{ $product->count }}">

                        @error('count')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Group(model):</label>
                        <select name="group_id" class="form-control select2" style="width: 100%;">
                            @foreach($groups as $group)
                                <option
                                    value="{{ $group->id }}" {{ $group->id == $product->group_id ? 'selected' : '' }}>
                                    {{ $group->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('group_id')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tags:</label>
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select tags"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    {{ is_array($product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>

                        @error('tags[]')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Color:</label>
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select colors"
                                style="width: 100%;">
                            @foreach($colors as $color)
                                <option
                                    {{ is_array($product->colors->pluck('id')->toArray()) && in_array($color->id, $product->colors->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $color->id }}">{{ $color->title }}</option>
                            @endforeach
                        </select>

                        @error('colors[]')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Preview Image</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $product->preview_image) }}" alt="preview_image" class="w-25">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <div class="d-flex flex-column">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        @error('product_images[]')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('product.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                    </div>
                </form>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
