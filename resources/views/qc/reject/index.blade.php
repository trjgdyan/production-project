@extends('layouts.app')
@section('title', 'Data Reject')
@section('content')
    <div class="shadow-sm p-3 mb-3 bg-white rounded">
        @if (session('success'))
            <div id="flash-message" class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            {{-- button back --}}
            <a href="{{ route('qc.menu') }}" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <a href="{{ route('rejects.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Add Data
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3 bg-primary">
            <h5 class="text-white p-1">REJECT DATA LIST</h5>
            <a href="" id="exportData" class="mr-2"><i class="fa-solid fa-cloud-arrow-down fa-2xl"
                    style="color: #FFD43B;" hidden></i></a>
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
                    <th>WEIGHT(KG)</th>
                    <th>SECTION</th>
                    <th>DETAIL</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rejects as $reject)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reject->created_at->format('d-m-Y') }}</td>
                        <td>{{ $reject->ITEM_ID }}</td>
                        <td>{{ $reject->PARTNUMBER }}</td>
                        <td>{{ $reject->TYPE }}</td>
                        <td>{{ $reject->CUSTOMER }}</td>
                        <td>{{ number_format($reject->QTY, 3) }}</td>
                        <td>{{ $reject->SECTION }}</td>
                        <td>{{ $reject->DETAIL }}</td>
                        <td>
                            {{-- <a href="{{ route('rejects.edit', $reject->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a> --}}
                            <form action="{{ route('rejects.destroy', $reject->NO_REJECT) }}" method="post"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#rejectDataList').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true,
                scrollX: true
            });

            setTimeout(function() {
                $('#flash-message').fadeOut('slow', function() {
                    $(this).remove(); // Menghapus elemen setelah animasi selesai
                });
            }, 3000);

        });
    </script>

@endsection
