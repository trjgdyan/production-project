@extends('layouts.app')

@section('title', 'Data Product')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('product.create') }}" class="btn btn-primary d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-plus" style="font-size: 1.8em; margin-right:0.5rem;"></i>Tambah Product
            </a>
        </div>

        @if (session('success'))
            <div id="flash-message" class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
            <div class="d-flex align-items-center">
                <label for="entries" class="mr-2">Show</label>
                <select id="entries" class="form-control w-auto h-2">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="ml-2">entries</span>
            </div>

            <form action="" method="get" class="form-inline">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                <button style="background-color: transparent; border:none;"><i class="fas fa-search"
                        style="font-size: 2em;"></i></button>
            </form>
        </div>

        <table class="table table-striped table-bordered w-100">
            <thead class="thead-dark">
                <tr class="text-center font-weight-bold">
                    <td>PRODID</td>
                    <td>NAME</td>
                    <td>TYPE</td>
                    <td>KATEGORI</td>
                    <td>BOM</td>
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
                            {{ $product->KATEGORI }}
                        </td>
                        <td>{{ $product->BOM }}</td>
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

        {{-- Pagination --}}
        <div class="d-flex justify-content-between align-items-center">
            {{-- <div>
                <p>Showing {{ $users->count() }} of {{ $users->total() }} entries</p>
            </div>
            <div>
                {{ $users->links() }}
            </div> --}}

            {{-- <p>Showing 1 to 10 of 57 entries</p> --}}


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#flash-message').fadeOut('slow', function() {
                    $(this).remove(); // Menghapus elemen setelah animasi selesai
                });
            }, 3000); // 3000 ms = 3 detik
        });
    </script>

@endsection
