@extends('layouts.app')

@section('title', 'Data Product')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('product.create') }}" class="btn btn-primary d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-plus" style="font-size: 1.8em; margin-right:0.5rem;"></i>Tambah Product
            </a>
        </div>

        @if (session('success'))
            <div id="flash-message" class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table id="dataProduct" class="table table-striped table-bordered w-100">
            <thead class="thead-dark">
                <tr class="text-center font-weight-bold">
                    <td>NO</td>
                    <td>NAME</td>
                    <td>TYPE</td>
                    <td>PARTNUMBER</td>
                    <td>ITEM ID</td>
                    <td>CUSTOMER</td>
                    <td>ISI</td>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="text-center">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $product->NAME }}
                        </td>
                        <td>
                            {{ $product->TYPE }}
                        </td>
                        <td>
                            {{ $product->PARTNUMBER }}
                        </td>
                        <td>
                            {{ $product->ITEM_ID }}
                        </td>
                        <td>
                            {{ $product->CUSTOMER }}
                        </td>
                        <td>
                            {{ $product->ISI }}
                        </td>
                        <td>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-info"><i
                                    class="fa-solid fa-eye fa-lg"></i></a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square fa-lg"></i></a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin untuk menghapus data {{ $product->NAME }}?');"><i
                                        class="fa-solid fa-trash fa-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataProduct').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });
            setTimeout(function() {
                $('#flash-message').fadeOut('slow', function() {
                    $(this).remove(); // Menghapus elemen setelah animasi selesai
                });
            }, 3000); // 3000 ms = 3 detik
        });
    </script>

@endsection
