@extends('layouts.app')
@section('title', 'Create User')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Create User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="noreg">Nomor Registrasi</label>
                        <input type="text" name="noreg" id="noreg" class="form-control">
                    </div>
                    @error('noreg')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="">SELECT DEPARTMENT</option>
                            <option value="PIC">PIC</option>
                            <option value="PRODUCTION">PRODUCTION</option>
                            <option value="IT">IT</option>
                        </select>
                    </div>
                    @error('department')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="number" name="class" id="class" class="form-control">
                    </div>
                    @error('class')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group d-flex">
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary ml-2">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
