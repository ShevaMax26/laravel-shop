@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
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
                <form action="{{ route('user.update', $user->id) }}" method="post" class="w-25">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control mb-3" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname:</label>
                        <input type="text" name="surname" class="form-control mb-3" value="{{ $user->surname }}">
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Patronymic:</label>
                        <input type="text" name="patronymic" class="form-control mb-3" value="{{ $user->patronymic }}">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" name="age" class="form-control mb-3" value="{{ $user->age }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control mb-3" value="{{ $user->address }}">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" class="form-control w-50">
                                @foreach($genders as $id => $gender)
                                    <option value="{{ $id }}" {{ $id == $user->gender ? 'selected' : '' }}>
                                        {{ $gender }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('user.index') }}"><i class="fas fa-arrow-circle-left ml-3 text-white"></i></a>
                    </div>
                </form>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
