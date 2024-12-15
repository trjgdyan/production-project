@extends('layouts.app')
@section('title', 'Data Reject')
@section('content')
    <div class="shadow-sm p-3 mb-3 bg-white rounded">
        <div class="d-flex justify-content-between align-items-center mt-3 bg-primary">
            <h5 class="text-white p-1">REJECT DATA LIST</h5>
            <a href="" class="mr-2"><i class="fa-solid fa-cloud-arrow-down fa-2xl" style="color: #FFD43B;"></i></a>
        </div>
        <table id="rejectDataList" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>DATE</th>
                    <th>ITEM ID</th>
                    <th>PARTNUMBER</th>
                    <th>TYPE</th>
                    <th>CUSTOMER</th>
                    <th>QTY</th>
                    <th>SECTION</th>
                    <th>DETAIL</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2022-01-01</td>
                    <td>123456</td>
                    <td>ABC123</td>
                    <td>TYPE A</td>
                    <td>CUSTOMER A</td>
                    <td>10</td>
                    <td>SECTION 1</td>
                    <td>DETAIL</td>
                    <td>
                        <a href="" class="btn btn-primary">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- <script>
        $(document).ready(function() {
            console.log('DataTables is loading...');
            $('#rejectDataList').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });
        });
    </script> --}}

@endsection
