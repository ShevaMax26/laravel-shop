@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $post->title }}</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('blog.post.index') }}"><i
                                        class="fas fa-arrow-circle-left mr-5 text-white"></i></a>
                                <a href="{{ route('blog.post.edit', $post->id) }}"
                                   class="btn btn-warning mr-3">Edit</a>
                                <form action="{{ route('blog.post.destroy', $post->id) }}" method="post">
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
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <th>Content</th>
                                    <td>
                                        <textarea style="border: none; outline: none; background: transparent; color: white; height: 100px; width: 100%;" readonly>{{ $post->content }}</textarea></td>
                                </tr>
                                <tr>
                                    <th>Preview Image</th>
                                    <td>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Main Image</th>
                                    <td>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $post->category->title }}</td>
                                </tr>
{{--                                <tr>--}}
{{--                                    <th>Tags</th>--}}
{{--                                    <td>--}}
{{--                                        @foreach($post->tags as $tag)--}}
{{--                                            <span--}}
{{--                                                style="background: #0c7f0f; padding: 2px 5px; border-radius: 3px">{{ $tag->title }}</span>--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
                                <tr>
                                    <th>It published</th>
                                    <td>{{ $post->is_published ? 'Yes' : 'No' }}</td>
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
