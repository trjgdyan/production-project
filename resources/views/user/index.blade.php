@extends('layouts.app')

@section('title', 'Data User')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('user.create') }}" class="btn btn-primary d-flex justify-content-center align-items-center">
                <i class="fas fa-user-plus mr-2" style="font-size: 1.8em;"></i>Tambah User
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
                    <td>NO</td>
                    <td>NAMA</td>
                    <td>NOREG</td>
                    <td>DEPARTMENT</td>
                    <td>CLASS</td>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->noreg }}
                        </td>
                        <td>
                            {{ $user->department }}
                        </td>
                        <td>{{ $user->class }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square fa-lg"></i></a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin untuk menghapus data {{ $user->name }}?');"><i
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
