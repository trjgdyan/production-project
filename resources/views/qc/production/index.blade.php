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
                                placeholder="INPUT PARTNUMBER">
                        </div>
                        @error('partnumber')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="item_id" class="font-weight-bold">Item ID</label>
                            <input type="text" name="ITEM_ID" class="form-control" id="item_id"
                                placeholder="INPUT ITEM ID">
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
                                    placeholder="INPUT WEIGHT OK">
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
                                    placeholder="INPUT QTY OK">
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
                                    placeholder="INPUT WEIGHT REJECT">
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
                                    placeholder="INPUT QTY REJECT">
                                <div class="input-group-append">
                                    <span class="input-group-text">PCS</span>
                                </div>
                            </div>
                        </div>
                        @error('qtyReject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-1 d-flex align-items-center justify-content-end">
                        <button class="btn btn-warning" type="button" id="submitForm">Create</button>
                    </div>
                </div>
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3 bg-primary">
        <h5 class="text-white p-1">Data Hasil Produksi</h5>
    </div>
    <table class="table table-striped table-bordered w-100">
        <thead class="thead-dark">
            <tr class="text-center font-weight-bold">
                <td>NO</td>
                <td>WO NUMBER</td>
                <td>PARTNUMBER</td>
                <td>ITEM ID</td>
                <td>SHIFT</td>
                <td>SECTION</td>
                <td>QTY GOOD</td>
                <td>QTY REJECT</td>
                <td>CREATED BY</td>
                <td>LAST UPDATED</td>
            </tr>
        </thead>
        <tbody id="dataProduction">
            @foreach ($productions as $production)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $production->WO_NUMBER }}</td>
                    <td>{{ $production->PARTNUMBER }}</td>
                    <td>{{ $production->ITEM_ID }}</td>
                    <td>{{ $production->SHIFT }}</td>
                    <td>{{ $production->SECTION }}</td>
                    <td>{{ $production->OK }}</td>
                    <td>{{ $production->REJECT }}</td>
                    <td>{{ $production->CREATED_BY }}</td>
                    <td>{{ $production->LAST_UPDATE }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
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
                    $('#inputProduction1').hide();

                    // Tampilkan form sesuai section yang dipilih
                    if (section == 1) {
                        $('#inputProduction1').show();
                        $('#qtyOK').prop('readonly', true);
                        $('#qtyReject').prop('readonly', true);
                        $('#weightOK').prop('readonly', false);
                        $('#weightReject').prop('readonly', false);

                    } else if (section == 2) {
                        $('#inputProduction1').show();
                        $('#weightOK').prop('readonly', true);
                        $('#weightReject').prop('readonly', true);
                        $('#qtyOK').prop('readonly', false);
                        $('#qtyReject').prop('readonly', false);
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

        function reloadTable() {
            $.ajax({
                url: "{{ route('productions.dataTable') }}", // Ganti dengan rute yang menghasilkan HTML tabel
                method: 'GET',
                success: function(response) {
                    console.log("Berhasil memuat tabel: ", response);
                    $('#dataProduction').empty();
                    $('#dataProduction').html(response);
                },
                error: function(error) {
                    console.log("Gagal memuat tabel: ", error);
                }
            });
        }

        setInterval(reloadTable, 3000);

        $(document).ready(function() {
            setTimeout(function() {
                $('#flash-message').fadeOut('slow', function() {
                    $(this).remove(); // Menghapus elemen setelah animasi selesai
                });
            }, 3000);
        });
    </script>

@endsection
