@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <table class="table w-100">
            <tbody class="bg-primary">
                <tr>
                    <td class="w-50 text-center border td-hover">
                        <a href="{{ route('productions.index') }}"
                            class="d-flex align-items-center justify-content-center text-white"
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

        {{-- CARD --}}
        <div class="container my-3">
            <div class="row g-3">
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="p-3 bg-gradient" style="background-color: #9C27B0; color: white; border-radius: 8px;">
                        <div class="d-flex justify-content-between mb-1">
                            <h6>TOTAL PCS REJECT</h6>
                            <a href=""><i class="far fa-eye fa-lg" style="color: #ffffff;"></i></a>
                        </div>
                        <h1 class="fw-bold mb-0">0%</h1>
                        <p class="mb-0">0 PCS</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="p-3 bg-gradient" style="background-color: #4CAF50; color: white; border-radius: 8px;">
                        <div class="d-flex justify-content-between mb-1">
                            <h6>TOP TYPE REJECT</h6>
                            <a href=""><i class="far fa-eye fa-lg" style="color: #ffffff;"></i></a>
                        </div>
                        <h1 class="fw-bold mb-0">0%</h1>
                        <p class="mb-0">0 PCS</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="p-3 bg-gradient" style="background-color: #FF9800; color: white; border-radius: 8px;">
                        <div class="d-flex justify-content-between mb-1">
                            <h6>TOTAL DETAIL REJECT</h6>
                            <a href=""><i class="far fa-eye fa-lg" style="color: #ffffff;"></i></a>
                        </div>
                        <h1 class="fw-bold mb-0">0%</h1>
                        <p class="mb-0">0 PCS</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="p-3 bg-gradient" style="background-color: #424242; color: white; border-radius: 8px;">
                        <div class="d-flex justify-content-between mb-1">
                            <h7>TOP PARTNUMBER REJECT</h7>
                            <a href=""><i class="far fa-eye fa-lg" style="color: #ffffff;"></i></a>
                        </div>
                        <h1 class="fw-bold mb-0">0%</h1>
                        <p class="mb-0">0 PCS</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- PILIH SECTION --}}
        <div class="shadow-sm p-3 mb-3 bg-white rounded">
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
        </div>
    </div>




    <style>
        .td-hover:hover {
            background-color: #4a6fad !important;
            transition: background-color 0.3s ease;
        }
    </style>



@endsection
