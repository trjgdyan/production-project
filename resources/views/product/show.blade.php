@extends('layouts.app')
@section('title', 'Detail Data Product ' . $product->NAME)
@section('content')
    <table class="table table-striped table-bordered w-100">
        <thead class="thead-dark">
            <tr class="text-center font-weight-bold">
                <td>NAME</td>
                <td>KETERANGAN</td>
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

            <tr>
                <td colspan="2" class="text-center">
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
