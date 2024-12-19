@extends('layouts.app')
@section('title', 'Detail Data Product ' . $product->NAME)
@section('content')
    <div class="table-responsive">
        <a href="{{ route('product.index') }}" class="btn btn-primary mb-2">
            <i class="fa-solid fa-arrow-left mr-1"></i>Back
        </a>

        <table id="showProduct" class="table table-striped table-bordered w-100">
            <thead class="thead-dark bg-primary">
                <tr class="text-center font-weight-bold">
                    <th class="text-white text-center">FIELD</th>
                    <th class="text-white text-center">VALUE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>NAME</td>
                    <td>{{ $product->NAME }}</td>
                </tr>
                <tr>
                    <td>ITEM ID</td>
                    <td>{{ $product->ITEM_ID }}</td>
                </tr>
                <tr>
                    <td>PARTNUMBER</td>
                    <td>{{ $product->PARTNUMBER }}</td>
                </tr>
                <tr>
                    <td>PARTNAME</td>
                    <td>{{ $product->PARTNAME }}</td>
                </tr>
                <tr>
                    <td>TYPE</td>
                    <td>{{ $product->TYPE }}</td>
                </tr>
                <tr>
                    <td>CUSTOMER</td>
                    <td>{{ $product->CUSTOMER }}</td>
                </tr>
                <tr>
                    <td>CUSTOMER ID</td>
                    <td>{{ $product->CUST_ID }}</td>
                </tr>
                <tr>
                    <td>SATUAN</td>
                    <td>{{ $product->SATUAN }}</td>
                </tr>
                <tr>
                    <td>ISI</td>
                    <td>{{ $product->ISI }}</td>
                </tr>
                <tr>
                    <td>SIZE</td>
                    <td>{{ $product->SIZE }}</td>
                </tr>
                <tr>
                    <td>HARGA</td>
                    <td>{{ $product->HARGA }}</td>
                </tr>
                <tr>
                    <td>STATUS</td>
                    <td>{{ $product->STATUS }}</td>
                </tr>
                <tr>
                    <td>CREATED DATE</td>
                    <td>{{ $product->CREATED_DATE }}</td>
                </tr>
                <tr>
                    <td>CREATED BY</td>
                    <td>{{ $product->CREATED_BY }}</td>
                </tr>

            </tbody>
        </table>


    </div>

    <script>
        $(document).ready(function() {
            $('#showProduct').DataTable({
                paging: false,
                searching: false,
                info: false,
                scrollX: true
            });
        });
    </script>
@endsection
