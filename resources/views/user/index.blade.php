@extends('layouts.app')

@section('title', 'Data User')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('user.create') }}" class="btn btn-primary d-flex justify-content-center align-items-center">
                <i class="fas fa-user-plus mr-2" style="font-size: 1.8em;"></i>Tambah User
            </a>
        </div>

        @if (session('success'))
            <div id="flash-message" class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif


        <table id="dataUser" class="table table-striped table-bordered w-100">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataUser').DataTable({
                "paging": true,
                "info": true,
                "searching": true,
                "scrollY": "true",
            });

            setTimeout(function() {
                $('#flash-message').fadeOut('slow', function() {
                    $(this).remove(); // Menghapus elemen setelah animasi selesai
                });
            }, 3000); // 3000 ms = 3 detik
        });
    </script>

@endsection
