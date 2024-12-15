@extends('layouts.app')
@section('title', 'Create Product')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Create product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="NAME">NAME</label>
                        <input type="text" name="NAME" id="NAME" class="form-control">
                    </div>
                    @error('NAME')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="TYPE">TYPE</label>
                        <select name="TYPE" id="TYPE" class="form-control">
                            <option value="">SELECT TYPE</option>
                            <option value="RAW MATERIAL">RAW MATERIAL</option>
                            <option value="SEMI-FINISHED GOODS">SEMI-FINISHED GOODS</option>
                            <option value="FINISHED GOODS">FINISHED GOODS</option>
                        </select>
                    </div>
                    @error('TYPE')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="KATEGORI">KATEGORI</label>
                        <input type="text" name="KATEGORI" id="KATEGORI" class="form-control">
                    </div>
                    @error('KATEGORI')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="SIZE">SIZE (Panjang x Lebar x Tinggi)</label>
                        <div class="d-flex">
                            <input type="text" name="SIZE_LENGTH" id="SIZE_LENGTH" class="form-control mr-2"
                                placeholder="Panjang">
                            <input type="text" name="SIZE_WIDTH" id="SIZE_WIDTH" class="form-control mr-2"
                                placeholder="Lebar">
                            <input type="text" name="SIZE_HEIGHT" id="SIZE_HEIGHT" class="form-control"
                                placeholder="Tinggi">
                        </div>
                    </div>
                    @error('SIZE_LENGTH')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('SIZE_WIDTH')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('SIZE_HEIGHT')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="ISI">ISI</label>
                        <input type="text" name="ISI" id="ISI" class="form-control">
                    </div>
                    @error('ISI')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="SATUAN">SATUAN</label>
                        <select name="SATUAN" id="SATUAN" class="form-control">
                            <option value="">SELECT SATUAN</option>
                            <option value="PCS">PCS</option>
                            <option value="UNIT">UNIT</option>
                        </select>
                    </div>
                    @error('SATUAN')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="HARGA">HARGA</label>
                        <input type="number" name="HARGA" id="HARGA" class="form-control">
                    </div>
                    @error('HARGA')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="BOM">BOM</label>
                        <input type="text" name="BOM" id="BOM" class="form-control">
                    </div>
                    @error('BOM')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="MESIN">MESIN</label>
                        <select name="MESIN" id="MESIN" class="form-control">
                            <option value="">SELECT MESIN</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="MESIN {{ $i }}">MESIN {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    @error('MESIN')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="WARNA">WARNA</label>
                        <select name="WARNA" id="WARNA" class="form-control">
                            <option value="">SELECT WARNA</option>
                            <option value="BLUE">BLUE</option>
                            <option value="BLACK">BLACK</option>
                            <option value="GREY">GREY</option>
                        </select>
                    </div>
                    @error('WARNA')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group d-flex">
                        <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary ml-2">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
