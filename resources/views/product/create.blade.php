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
                        <label for="ITEM_ID">ITEM_ID</label>
                        <input type="text" name="ITEM_ID" id="ITEM_ID" class="form-control">
                    </div>
                    @error('ITEM_ID')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="PARTNUMBER">PARTNUMBER</label>
                            <input type="text" name="PARTNUMBER" id="PARTNUMBER" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="PARTNAME">PARTNAME</label>
                            <input type="text" name="PARTNAME" id="PARTNAME" class="form-control">
                        </div>
                    </div>
                    @error('PARTNUMBER')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('PARTNAME')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="TYPE">TYPE</label>
                        <select name="TYPE" id="TYPE" class="form-control">
                            <option value="">SELECT TYPE</option>
                            <option value="TYP111">TYP111</option>
                            <option value="TYP212">TYP212</option>
                            <option value="TYP313">TYP313</option>
                            <option value="TYP414">TYP414</option>
                            <option value="TYP515">TYP515</option>
                        </select>
                    </div>
                    @error('TYPE')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="CUSTOMER">CUSTOMER</label>
                            <input type="text" name="CUSTOMER" id="CUSTOMER" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="CUST_ID">CUST_ID</label>
                            <input type="text" name="CUST_ID" id="CUST_ID" class="form-control">
                        </div>
                    </div>
                    @error('CUSTOMER')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('CUST_ID')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ISI">ISI</label>
                            <input type="number" name="ISI" id="ISI" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="SATUAN">SATUAN</label>
                            <select name="SATUAN" id="SATUAN" class="form-control">
                                <option value="">SELECT SATUAN</option>
                                <option value="PCS">PCS</option>
                                <option value="UNIT">UNIT</option>
                            </select>
                        </div>
                    </div>
                    @error('ISI')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('SATUAN')
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
                        <label for="HARGA">HARGA</label>
                        <input type="number" name="HARGA" id="HARGA" class="form-control">
                    </div>
                    @error('HARGA')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="STATUS">STATUS</label>
                        <input type="text" name="STATUS" id="STATUS" class="form-control">
                    </div>
                    @error('STATUS')
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
