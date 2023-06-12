@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $product->title }}</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('product.index') }}"><i
                                        class="fas fa-arrow-circle-left mr-5 text-white"></i></a>
                                <a href="{{ route('product.edit', $product->id) }}"
                                   class="btn btn-warning mr-3">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <th>Content</th>
                                    <td>
                                        <textarea style="border: none; outline: none; background: transparent; color: white; height: 100px; width: 100%;" readonly>{{ $product->content }}</textarea></td>
                                </tr>
                                <tr>
                                    <th>Preview Image</th>
                                    <td>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $product->preview_image) }}" alt="preview_image">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Image</th>
                                    <td>
                                        <div class="mb-2 d-flex align-items-center" style="max-width: 150px">
                                            @foreach($product->productImages as $productImage)
                                                <img src="{{ asset('storage/' . $productImage->file_path) }}" alt="preview_image" class="w-100 mr-2">
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>${{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <th>Old Price</th>
                                    <td>{{ isset($product->old_price) ? '$'.$product->old_price : '-'  }}</td>
                                </tr>
                                <tr>
                                    <th>Count</th>
                                    <td>{{ $product->count }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $product->category->title }}</td>
                                </tr>
                                <tr>
                                    <th>Group</th>
                                    <td>{{ $product->group->title }}</td>
                                </tr>
                                <tr>
                                    <th>Tags</th>
                                    <td>
                                        @foreach($product->tags as $tag)
                                            <span
                                                style="background: #0c7f0f; padding: 2px 5px; border-radius: 3px">{{ $tag->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Colors</th>
                                    <td>
                                        <div class="d-flex">
                                            @foreach($product->colors as $color)
                                                <div
                                                    style="width: 22px; height: 22px; margin-right: 7px; border-radius: 3px; background: {{ '#' . $color->title }};"></div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>It published</th>
                                    <td>{{ $product->is_published ? 'Yes' : 'No' }}</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
