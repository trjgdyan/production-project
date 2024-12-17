@extends('layouts.app')
@section('title', 'Data Produksi')

@section('content')
    <div class="container">
        @if (session('success'))
            <div id="flash-message" class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start mb-3">
                <a href="{{ route('qc.menu') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left" style="color: #ffffff; font-weight:bold; font-size:1em"></i>
                </a>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary" id="toggleInputProduction">
                    <i class="fas fa-plus mr-1"></i>
                    Input Produksi</button>
            </div>
        </div>
        <form id="productionForm">
            @csrf
            {{-- PILIH SECTION, SHIFT, TANGGAL --}}
            <div class="shadow-sm p-3 mb-3 bg-white rounded" id="inputProductionSection" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mt-3 bg-success">
                    <h5 class="text-white p-1">Input Produksi</h5>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="section" class="font-weight-bold">Section</label>
                            <select class="form-control" name="SECTION" id="section">
                                <option value="">Pilih Section</option>
                                <option value="1">Section 1</option>
                                <option value="2">Section 2</option>
                            </select>
                        </div>
                        @error('section')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal" class="font-weight-bold">Tanggal</label>
                            <input type="date" class="form-control" name="TANGGAL" id="tanggal">
                        </div>
                        @error('tanggal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="shift" class="font-weight-bold">Shift</label>
                            <input type="number" class="form-control" name="SHIFT" id="shift"
                                placeholder="INPUT SHIFT">
                        </div>
                        @error('shift')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-1 d-flex align-items-center justify-content-end">
                    <button class="btn btn-primary" id="btnOk" type="button">OK</button>
                </div> --}}
                </div>
            </div>

            <div class="shadow-sm p-3 mb-3 bg-white rounded" id="inputProduction" style="display: none">
                <div class="d-flex justify-content-between align-items-center mt-3 bg-warning">
                    <h5 class="text-white p-1" id="formTitle">
                        Input Produksi Section
                    </h5>
                </div>
                {{-- SECTION 1 --}}
                <div class="row mt-2" id="inputProduction1" style="display: none">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="WO_NUMBER" class="font-weight-bold">No.WO</label>
                            <input type="text" name="WO_NUMBER" class="form-control" id="WO_NUMBER"
                                placeholder="INPUT NO.WO">
                        </div>
                        @error('WO_NUMBER')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="partnumber" class="font-weight-bold">Partnumber</label>
                            <input type="text" name="PARTNUMBER" class="form-control" id="partnumber"
                                placeholder="INPUT PARTNUMBER" readonly>
                        </div>
                        @error('partnumber')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="item_id" class="font-weight-bold">Item ID</label>
                            <input type="text" name="ITEM_ID" class="form-control" id="item_id"
                                placeholder="INPUT ITEM ID" readonly>
                        </div>
                        @error('item_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="weightOK" class="font-weight-bold">Weight OK</label>
                            <div class="input-group">
                                <input type="number" name="WEIGHT_OK" class="form-control" id="weightOK"
                                    placeholder="INPUT WEIGHT OK" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">KG</span>
                                </div>
                            </div>
                        </div>
                        @error('weightOK')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="qtyOK" class="font-weight-bold">QTY OK</label>
                            <div class="input-group">
                                <input type="number" name="OK" class="form-control" id="qtyOK"
                                    placeholder="INPUT QTY OK" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">PCS</span>
                                </div>
                            </div>
                        </div>
                        @error('qtyOK')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="weightReject" class="font-weight-bold">Weight Reject</label>
                            <div class="input-group">
                                <input type="number" name="WEIGHT_REJECT" class="form-control" id="weightReject"
                                    placeholder="INPUT WEIGHT REJECT" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">KG</span>
                                </div>
                            </div>
                        </div>
                        @error('weightReject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="qtyReject" class="font-weight-bold">QTY REJECT</label>
                            <div class="input-group">
                                <input type="number" name="REJECT" class="form-control" id="qtyReject"
                                    placeholder="INPUT QTY REJECT" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">PCS</span>
                                </div>
                            </div>
                        </div>
                        @error('qtyReject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- customer and cust id start --}}
                    <div class="col-md-3" hidden>
                        <div class="form-group">
                            <label for="CUSTOMER" class="font-weight-bold">CUSTOMER</label>
                            <input type="text" name="CUSTOMER" class="form-control" id="CUSTOMER"
                                placeholder="INPUT ITEM ID">
                        </div>
                    </div>
                    <div class="col-md-3" hidden>
                        <div class="form-group">
                            <label for="CUST_ID" class="font-weight-bold">CUST_ID</label>
                            <input type="text" name="CUST_ID" class="form-control" id="CUST_ID"
                                placeholder="INPUT ITEM ID">
                        </div>
                    </div>
                    {{-- customer and cust id end --}}


                    <div class="col-md-1 d-flex align-items-center justify-content-end">
                        <button class="btn btn-warning" type="button" id="submitForm">Create</button>
                    </div>
                </div>
        </form>

        <table id="dataCF" class="display table table-bordered ">
            <thead class="bg-primary">
                <th class="text-white text-center">SELECT</th>
                <th class="text-white text-center">ITEM ID</th>
                <th class="text-white text-center">PARTNUMBER</th>
                <th class="text-white text-center">PARTNAME</th>
                <th class="text-white text-center">CUSTOMER NAME</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3 bg-primary">
        <h5 class="text-white p-1">Data Hasil Produksi</h5>
    </div>
    <table id="myTable" class="display table table-bordered table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>WO NUMBER</th>
                <th>PARTNUMBER</th>
                {{-- <th>ITEM ID</th> --}}
                <th>SHIFT</th>
                <th>SECTION</th>
                <th>QTY GOOD</th>
                <th>QTY REJECT</th>
                <th>CREATED BY</th>
                <th>LAST UPDATED</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody id="dataProduction">
            @foreach ($productions as $production)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $production->WO_NUMBER }}</td>
                    <td>{{ $production->PARTNUMBER }}</td>
                    {{-- <td>{{ $production->ITEM_ID }}</td> --}}
                    <td>{{ $production->SHIFT }}</td>
                    <td>{{ $production->SECTION }}</td>
                    <td>{{ $production->OK }}</td>
                    <td>{{ $production->REJECT }}</td>
                    <td>{{ $production->CREATED_BY }}</td>
                    <td>{{ $production->LAST_UPDATE }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="" class="btn btn-warning mr-2">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('productions.destroy', $production->NO_PRODUKSI) }}" method="post"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data dengan WO NUMBER : {{ $production->WO_NUMBER }}?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>

    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });

            let tableCF = $('#dataCF').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });

            $('#toggleInputProduction').click(function() {
                $('#inputProductionSection').toggle();
            });

            function updateForm() {
                const section = $('#section').val();
                const tanggal = $('#tanggal').val();
                const shift = $('#shift').val();

                if (section && tanggal && shift) {
                    // Update judul dengan section yang dipilih
                    $('#formTitle').text(`Input Produksi Section ${section}`);

                    $('#inputProduction').show();
                    $('#inputProduction1').show();

                    if (section == 1) {
                        $('#WO_NUMBER').on('keydown', function(e) {
                            if (e.key === 'Enter') {
                                $('#partnumber').focus();
                                $('#partnumber').prop('readonly', false);
                            }
                        });
                        $('#partnumber').on('keydown', function(e) {
                            if (e.key === 'Enter') {
                                $('#weightOK').focus();
                                $('#weightOK').prop('readonly', false);
                            }
                        });
                        $('#weightOK').on('keydown', function(e) {
                            if (e.key === 'Enter') {
                                $('#weightReject').focus();
                                $('#weightReject').prop('readonly', false);
                            }
                        });

                    } else if (section == 2) {
                        $('#WO_NUMBER').on('keydown', function(e) {
                            if (e.key === 'Enter') {
                                $('#partnumber').focus();
                                $('#partnumber').prop('readonly', false);
                            }
                        });
                        $('#partnumber').on('keydown', function(e) {
                            if (e.key === 'Enter') {
                                $('#qtyOK').focus();
                                $('#qtyOK').prop('readonly', false);
                            }
                        });

                        $('#qtyOK').on('keydown', function(e) {
                            if (e.key === 'Enter') {
                                $('#qtyReject').focus();
                                $('#qtyReject').prop('readonly', false);
                            }
                        });
                    }
                } else {
                    // Jika ada input yang kosong, sembunyikan semua
                    $('#formTitle').text('Input Produksi Section');
                    $('#inputProduction').hide();
                    $('#inputProduction1').hide();
                }
            }

            // Event listener untuk semua input
            $('#section, #tanggal, #shift').on('input', function() {
                updateForm();
            });

            updateForm();


            // menghitung qty OK dan qty Reject pada section 1
            $('#weightOK').on('input', function() {
                const weightOk = parseFloat($(this).val()) || 0;
                const qtyOk = weightOk * 2.5;
                $('#qtyOK').val(qtyOk.toFixed(0));
            });

            $('#weightReject').on('input', function() {
                const weightReject = parseFloat($(this).val()) || 0;
                const qtyReject = weightReject * 2.5;
                $('#qtyReject').val(qtyReject.toFixed(0));
            });

            // menghitung weight OK dan weight Reject pada section 2
            $('#qtyOK').on('input', function() {
                const qtyOk = parseFloat($(this).val()) || 0;
                const weightOk = qtyOk / 2.5;
                $('#weightOK').val(weightOk.toFixed(2));
            });

            $('#qtyReject').on('input', function() {
                const qtyReject = parseFloat($(this).val()) || 0;
                const weightReject = qtyReject / 2.5;
                $('#weightReject').val(weightReject.toFixed(2));
            });

            // select berdasarkan partnumber
            $('#partnumber').on('input', function() {
                var partnumber = $(this).val();
                if (partnumber.length > 0) {
                    $.ajax({
                        url: "{{ route('fetchData.searchDataCF') }}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },

                        data: {
                            partnumber: partnumber
                        },
                        success: function(response) {
                            console.log(response);
                            $('#dataCF tbody').empty();

                            response.forEach(function(item) {
                                // radionya isinya partnumber dan item_id
                                $('#dataCF tbody').append(`
                                    <tr>
                                        <td><input type="radio" name="item_id" value="${item.PARTNUMBER}|${item.ITEM_ID}|${item.CUSTOMER}|${item.CUST_ID}"></td>
                                        <td>${item.ITEM_ID}</td>
                                        <td>${item.PARTNUMBER}</td>
                                        <td>${item.PARTNAME}</td>
                                        <td>${item.CUSTOMER}</td>
                                    </tr>
                                `);
                            });

                            if (response.length === 0) {
                                $('#dataCF tbody').append(`
                                    <tr>
                                        <td colspan="5" class="text-center">No data found</td>
                                    </tr>
                                `);
                            }
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    });
                } else {
                    $('#dataCF tbody').empty();
                }
            });

            $('#dataCF tbody').on('click', 'tr', function() {
                $(this).find('input[type="radio"]').prop('checked', true);
                const item = $(this).find('input[type="radio"]').val().split('|');
                $('#partnumber').val(item[0]);
                $('#item_id').val(item[1]);
                $('#CUSTOMER').val(item[2]);
                $('#CUST_ID').val(item[3]);
                // $('#dataCF tbody').empty();
            });


            // submit form
            $('#submitForm').click(function() {
                const formData = {
                    SECTION: $('#section').val(),
                    TANGGAL: $('#tanggal').val(),
                    SHIFT: $('#shift').val(),
                    WO_NUMBER: $('#WO_NUMBER').val(),
                    PARTNUMBER: $('#partnumber').val(),
                    ITEM_ID: $('#item_id').val(),
                    WEIGHT_OK: $('#weightOK').val(),
                    OK: $('#qtyOK').val(),
                    WEIGHT_REJECT: $('#weightReject').val(),
                    REJECT: $('#qtyReject').val(),
                    CUSTOMER: $('#CUSTOMER').val(),
                    CUST_ID: $('#CUST_ID').val(),
                };

                // console.log(formData);// Menampilkan data yang akan dikirimkan

                $.ajax({
                    url: "{{ route('productions.store') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function(response) {
                        alert('Data berhasil disimpan');
                        console.log(response);
                        $('#productionForm').trigger('reset');
                        updateForm();
                    },
                    error: function(error) {
                        alert('Data gagal disimpan');
                        console.log(error.responseText);
                    }
                });
            });

        });

        // function reloadTable() {
        //     $.ajax({
        //         url: "{{ route('fetchData.production') }}", // Ganti dengan rute yang menghasilkan HTML tabel
        //         method: 'GET',
        //         success: function(response) {
        //             console.log("Berhasil memuat tabel: ", response);
        //             $('#dataProduction').empty();
        //             let tableRows = response.map((data, index) => {
        //                 return `
    //                             <tr class="text-center">
    //                                 <td>${index + 1}</td>
    //                                 <td>${data.WO_NUMBER}</td>
    //                                 <td>${data.PARTNUMBER}</td>
    //                                 <td>${data.ITEM_ID}</td>
    //                                 <td>${data.SHIFT}</td>
    //                                 <td>${data.SECTION}</td>
    //                                 <td>${data.OK}</td>
    //                                 <td>${data.REJECT}</td>
    //                                 <td>${data.CREATED_BY}</td>
    //                                 <td>${data.LAST_UPDATE}</td>
    //                             </tr>
    //                         `;
        //             });
        //             $('#dataProduction').append(tableRows);
        //         },
        //         error: function(error) {
        //             console.log("Gagal memuat tabel: ", error);
        //         }
        //     });
        // }

        // setInterval(reloadTable, 3000);

        $(document).ready(function() {
            setTimeout(function() {
                $('#flash-message').fadeOut('slow', function() {
                    $(this).remove(); // Menghapus elemen setelah animasi selesai
                });
            }, 3000);
        });
    </script>



@endsection
