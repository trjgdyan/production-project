@extends('layouts.app')
@section('title', 'Edit Data User')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Create User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $user->name) }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="noreg">Nomor Registrasi</label>
                        <input type="text" name="noreg" id="noreg" class="form-control"
                            value="{{ old('noreg', $user->noreg) }}">
                    </div>
                    @error('noreg')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            {{-- <option value="">SELECT DEPARTMENT</option> --}}
                            <option value="PIC" {{ old('department', $user->department) == 'PIC' ? 'selected' : '' }}>PIC
                            </option>
                            <option value="PRODUCTION"
                                {{ old('department', $user->department) == 'PRODUCTION' ? 'selected' : '' }}>PRODUCTION
                            </option>
                            <option value="IT" {{ old('department', $user->department) == 'IT' ? 'selected' : '' }}>IT
                            </option>
                        </select>
                    </div>

                    @error('department')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="number" name="class" id="class" class="form-control"
                            value="{{ old('class', $user->class) }}">
                    </div>
                    @error('class')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group d-flex">
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary ml-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
