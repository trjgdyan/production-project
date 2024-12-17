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
                        <label for="ITEM_ID">ITEM_ID</label>
                        <input type="text" name="ITEM_ID" id="ITEM_ID" class="form-control"
                            value="{{ old('ITEM_ID', $product->ITEM_ID) }}">
                    </div>
                    @error('ITEM_ID')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="PARTNUMBER">PARTNUMBER</label>
                        <input type="text" name="PARTNUMBER" id="PARTNUMBER" class="form-control"
                            value="{{ old('PARTNUMBER', $product->PARTNUMBER) }}">
                    </div>
                    @error('PARTNUMBER')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="PARTNAME">PARTNAME</label>
                        <input type="text" name="PARTNAME" id="PARTNAME" class="form-control"
                            value="{{ old('PARTNAME', $product->PARTNAME) }}">
                    </div>
                    @error('PARTNAME')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="TYPE">TYPE</label>
                        <select name="TYPE" id="TYPE" class="form-control">
                            <option value="">SELECT TYPE</option>
                            <option value="TYP111"{{ old('TYPE', $product->TYPE) == 'TYP111' ? 'selected' : '' }}>TYP111
                            </option>
                            <option value="TYP212"{{ old('TYPE', $product->TYPE) == 'TYP212' ? 'selected' : '' }}>TYP212
                            </option>
                            <option value="TYP313"{{ old('TYPE', $product->TYPE) == 'TYP313' ? 'selected' : '' }}>TYP313
                            </option>
                            <option value="TYP414"{{ old('TYPE', $product->TYPE) == 'TYP414' ? 'selected' : '' }}>TYP414
                            </option>
                            <option value="TYP515"{{ old('TYPE', $product->TYPE) == 'TYP515' ? 'selected' : '' }}>TYP515
                            </option>

                        </select>
                    </div>
                    @error('TYPE')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="CUSTOMER">CUSTOMER</label>
                        <input type="text" name="CUSTOMER" id="CUSTOMER" class="form-control"
                            value="{{ old('CUSTOMER', $product->CUSTOMER) }}">
                    </div>
                    @error('CUSTOMER')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="CUST_ID">CUST_ID</label>
                        <input type="text" name="CUST_ID" id="CUST_ID" class="form-control"
                            value="{{ old('CUST_ID', $product->CUST_ID) }}">
                    </div>
                    @error('CUST_ID')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="SATUAN">SATUAN</label>
                        <select name="SATUAN" id="SATUAN" class="form-control">
                            <option value="PCS" {{ old('SATUAN', $product->SATUAN) == 'PCS' ? 'selected' : '' }}>PCS
                            </option>
                            <option value="UNIT" {{ old('SATUAN', $product->SATUAN) == 'UNIT' ? 'selected' : '' }}>UNIT
                            </option>
                        </select>
                    </div>
                    @error('SATUAN')
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
                        <label for="HARGA">HARGA</label>
                        <input type="number" name="HARGA" id="HARGA" class="form-control"
                            value="{{ old('HARGA', $product->HARGA) }}">
                    </div>
                    @error('HARGA')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="STATUS">STATUS</label>
                        <input type="text" name="STATUS" id="STATUS" class="form-control"
                            value="{{ old('STATUS', $product->STATUS) }}">
                    </div>
                    @error('STATUS')
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
