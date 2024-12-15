@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <table class="table w-100">
            <tbody class="bg-primary">
                <tr>
                    <td class="w-50 text-center border td-hover">
                        <a href="{{route('productions.index')}}" class="d-flex align-items-center justify-content-center text-white"
                            style="font-weight: bold; text-decoration: none;">
                            <i class="fas fa-edit mr-3" style="font-size: 2.5em;"></i>INPUT PRODUCTION
                        </a>
                    </td>
                    <td class="w-50 text-center border td-hover">
                        <a href="#" class="d-flex align-items-center justify-content-center text-white"
                            style="font-weight: bold; text-decoration: none;">
                            <i class="fas fa-exclamation-triangle mr-3" style="font-size: 3em;"></i>INPUT REJECT
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <div class="shadow-sm p-3 mb-3 bg-white rounded">
        <div class="d-flex justify-content-between align-items-center mt-3 bg-success">
            <h5 class="text-white p-1">PILIH SECTION</h5>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="section" class="font-weight-bold">Section</label>
                    <select class="form-control" id="section">
                        <option value="1">Section 1</option>
                        <option value="2">Section 2</option>
                    </select>
                </div>
                @error('sectiom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="start_date" class="font-weight-bold">Start Period</label>
                    <input type="date" class="form-control" id="start_date">
                </div>
                @error('start_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="end_date" class="font-weight-bold">End Period</label>
                    <input type="date" class="form-control" id="end_date">
                </div>
                @error('end_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>

        </div>
    </div> --}}



    <style>
        .td-hover:hover {
            background-color: #4a6fad !important;
            transition: background-color 0.3s ease;
        }
    </style>



@endsection
