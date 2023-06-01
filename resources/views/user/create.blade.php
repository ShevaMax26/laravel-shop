@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Users</li>
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
                    <form action="{{ route('user.store') }}" method="post" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control mb-3" placeholder="User name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control mb-3" placeholder="User email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control mb-3" placeholder="User password" value="{{ old('password') }}">
                        </div>
                        @error('password')
                        <div>{{{ $message }}}</div>
                        @enderror
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm password" value="{{ old('password_confirmation') }}">
                        </div>
                        @error('password_confirmation')
                        <div>{{{ $message }}}</div>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="surname" class="form-control mb-3" placeholder="User surname" value="{{ old('surname') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="patronymic" class="form-control mb-3" placeholder="User patronymic" value="{{ old('patronymic') }}">
                        </div>
                        <div class="form-group">
                            <input type="number" name="age" class="form-control mb-3" placeholder="User age" value="{{ old('age') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control mb-3" placeholder="User address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <select name="gender" class="form-control w-50">
                                    <option disabled selected>Select your gender</option>
                                    @foreach($genders as $id => $gender)
                                        <option value="{{ $id }}" {{ $id == old('gender') ? 'selected' : '' }}>
                                            {{ $gender }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('gender')
                        <div>{{{ $message }}}</div>
                        @enderror
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('user.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
