@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="NAME">NAME</label>
                        <input type="text" name="NAME" id="NAME" class="form-control"
                            value="{{ old('NAME', $product->NAME) }}">
                    </div>
                    @error('NAME')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="TYPE">TYPE</label>
                        <select name="TYPE" id="TYPE" class="form-control">
                            <option value="">SELECT TYPE</option>
                            <option value="RAW MATERIAL"
                                {{ old('TYPE', $product->TYPE) == 'RAW MATERIAL' ? 'selected' : '' }}>RAW MATERIAL</option>
                            <option value="SEMI-FINISHED GOODS"
                                {{ old('TYPE', $product->TYPE) == 'SEMI-FINISHED GOODS' ? 'selected' : '' }}>SEMI-FINISHED
                                GOODS</option>
                            <option value="FINISHED GOODS"
                                {{ old('TYPE', $product->TYPE) == 'FINISHED GOODS' ? 'selected' : '' }}>FINISHED GOODS
                            </option>
                        </select>
                    </div>
                    @error('TYPE')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="KATEGORI">KATEGORI</label>
                        <input type="text" name="KATEGORI" id="KATEGORI" class="form-control"
                            value="{{ old('KATEGORI', $product->KATEGORI) }}">
                    </div>
                    @error('KATEGORI')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="SIZE">SIZE (Panjang x Lebar x Tinggi)</label>
                        <div class="d-flex">
                            <input type="text" name="SIZE_LENGTH" id="SIZE_LENGTH" class="form-control mr-2"
                                placeholder="Panjang" value="{{ old('SIZE_LENGTH', $product->SIZE_LENGTH) }}">
                            <input type="text" name="SIZE_WIDTH" id="SIZE_WIDTH" class="form-control mr-2"
                                placeholder="Lebar" value="{{ old('SIZE_WIDTH', $product->SIZE_WIDTH) }}">
                            <input type="text" name="SIZE_HEIGHT" id="SIZE_HEIGHT" class="form-control"
                                placeholder="Tinggi" value="{{ old('SIZE_HEIGHT', $product->SIZE_HEIGHT) }}">
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
                        <input type="number" name="ISI" id="ISI" class="form-control"
                            value="{{ old('ISI', $product->ISI) }}">
                    </div>
                    @error('ISI')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="SATUAN">SATUAN</label>
                        <input type="text" name="SATUAN" id="SATUAN" class="form-control"
                            value="{{ old('SATUAN', $product->SATUAN) }}">
                    </div>
                    @error('SATUAN')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="HARGA">HARGA</label>
                        <input type="number" name="HARGA" id="HARGA" class="form-control"
                            value="{{ old('HARGA', $product->HARGA) }}">
                    </div>
                    @error('HARGA')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="BOM">BOM</label>
                        <input type="text" name="BOM" id="BOM" class="form-control"
                            value="{{ old('BOM', $product->BOM) }}">
                    </div>
                    @error('BOM')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="MESIN">MESIN</label>
                        <select name="MESIN" id="MESIN" class="form-control">
                            <option value="">SELECT MESIN</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="MESIN {{ $i }}"
                                    {{ old('MESIN', $product->MESIN) == "MESIN $i" ? 'selected' : '' }}>MESIN
                                    {{ $i }}</option>
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
                            <option value="BLUE" {{ old('WARNA', $product->WARNA) == 'BLUE' ? 'selected' : '' }}>BLUE
                            </option>
                            <option value="BLACK" {{ old('WARNA', $product->WARNA) == 'BLACK' ? 'selected' : '' }}>BLACK
                            </option>
                            <option value="GREY" {{ old('WARNA', $product->WARNA) == 'GREY' ? 'selected' : '' }}>GREY
                            </option>
                        </select>
                    </div>
                    @error('WARNA')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group d-flex">
                        <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary ml-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
