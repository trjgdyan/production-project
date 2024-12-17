@extends('layouts.app')

@section('title', 'Add Reject Data')
@section('content')
    <div class="container">
        {{-- <div class="card"> --}}
        <form id="RejectForm">
            @csrf
            {{-- PILIH SECTION, SHIFT, TANGGAL --}}
            <div class="shadow-sm p-3 mb-3 bg-white rounded" id="inputRejectSection" style="display: block;">
                <div class="d-flex justify-content-between align-items-center mt-3 bg-success">
                    <h5 class="text-white p-1">Input Reject</h5>
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

                    {{-- <div class="col-md-1 d-flex align-items-center justify-content-end">
                    <button class="btn btn-primary" id="btnOk" type="button">OK</button>
                </div> --}}
                </div>
            </div>

            <div class="shadow-sm p-3 mb-3 bg-white rounded" id="inputReject" style="display: none">
                <div class="d-flex justify-content-between align-items-center mt-3 bg-warning">
                    <h5 class="text-white p-1" id="formTitle">
                        Input Reject Section
                    </h5>
                </div>
                {{-- SECTION 1 --}}
                <div class="row mt-2" id="inputReject1" style="display: none">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="PARTNUMBER" class="font-weight-bold">PARTNUMBER</label>
                            <input type="text" name="PARTNUMBER" class="form-control" id="PARTNUMBER"
                                placeholder="PARTNUMBER">
                        </div>
                        @error('PARTNUMBER')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="item_id" class="font-weight-bold">Item ID</label>
                            <input type="text" name="ITEM_ID" class="form-control" id="item_id"
                                placeholder="INPUT ITEM ID">
                        </div>
                        @error('item_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="PCS" class="font-weight-bold">PCS</label>
                            <input type="number" name="PCS" class="form-control" id="PCS" placeholder="INPUT PCS"
                                readonly>
                        </div>
                        @error('PCS')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="MAX_PCS" class="font-weight-bold">MAX_PCS</label>
                            <input type="number" name="MAX_PCS" class="form-control" id="MAX_PCS"
                                placeholder="INPUT MAX_PCS">
                        </div>
                        @error('MAX_PCS')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="QTY" class="font-weight-bold">QTY</label>
                            <div class="input-group">
                                <input type="number" name="QTY" class="form-control" id="QTY" placeholder="QTY"
                                    readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">KG</span>
                                </div>
                            </div>
                        </div>
                        @error('QTY')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="WO_NUMBER" class="font-weight-bold">WO_NUMBER</label>
                            <div class="input-group">
                                <input type="text" name="WO_NUMBER" class="form-control" id="WO_NUMBER"
                                    placeholder="INPUT WO NUMBER">
                            </div>
                        </div>
                        @error('WO_NUMBER')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="SHIFT" class="font-weight-bold">SHIFT</label>
                            <input type="text" name="SHIFT" class="form-control" id="SHIFT"
                                placeholder="SHIFT">
                        </div>
                        @error('SHIFT')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="DETAIL_REJECT" class="font-weight-bold">DETAIL_REJECT</label>
                            <select name="DETAIL_REJECT" class="form-control" id="DETAIL_REJECT">
                                <option value="" disabled selected>Pilih DETAIL_REJECT</option>
                            </select>
                        </div>
                        @error('DETAIL_REJECT')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-2" id="inputNoMesin">
                        <div class="form-group">
                            <label for="NO_MESIN" class="font-weight-bold">NO_MESIN</label>
                            <select name="NO_MESIN" id="NO_MESIN" class="form-control">
                                <option value="" disabled selected>Select Machine</option>
                                <?php for($i = 1; $i <= 5; $i++) : ?>
                                <option value="MC-<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">MC-<?= $i ?></option>
                                <?php endfor; ?>
                                <?php for($j = 6; $j <= 10; $j++) : ?>
                                <option value="MFA-<?= str_pad($j, 2, '0', STR_PAD_LEFT) ?>">MFA-<?= $j ?></option>
                                <?php endfor; ?>
                            </select>
                            </select>
                        </div>
                        @error('NO_MESIN')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-1 d-flex align-items-center justify-content-end">
                        <button class="btn btn-warning" type="button" id="submitForm">Create</button>
                    </div>
                </div>

                {{-- INDIKATOR BERAT --}}
                <div class="d-flex justify-content-center align-items-center my-3" style="gap: 2rem;">
                    <!-- Kotak Biru -->
                    <div class="d-flex align-items-center me-3">
                        <div style="width: 20px; height: 20px; background-color: #2196F3; margin-right: 5px;"></div>
                        <span style="font-weight: bold; color: black;">Kurang</span>
                    </div>

                    <!-- Kotak Hijau -->
                    <div class="d-flex align-items-center me-3 ">
                        <div style="width: 20px; height: 20px; background-color: #4CAF50; margin-right: 5px;"></div>
                        <span style="font-weight: bold; color: black;">Cukup</span>
                    </div>

                    <!-- Kotak Merah -->
                    <div class="d-flex align-items-center">
                        <div style="width: 20px; height: 20px; background-color: #F44336; margin-right: 5px;"></div>
                        <span style="font-weight: bold; color: black;">Lebih</span>
                    </div>
                </div>

                <table id="dataReject" class="table table-bordered table-striped mt-3" style="display: none;">
                    <thead class="bg-primary text-white">
                        <th class="text-white text-center">SELECT</th>
                        <th class="text-white text-center">ITEM ID</th>
                        <th class="text-white text-center">PARTNUMBER</th>
                        <th class="text-white text-center">PARTNAME</th>
                        <th class="text-white text-center">CUSTOMER</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataReject').DataTable();

            function updateForm() {
                const section = $('#section').val();
                const tanggal = $('#tanggal').val();
                // const shift = $('#shift').val();

                if (section && tanggal) {
                    // Update judul dengan section yang dipilih
                    $('#formTitle').text(`Input Reject Section ${section}`);

                    $('#inputReject').show();
                    $('#inputReject1').hide();

                    var detailReject = $('#DETAIL_REJECT');

                    var option = {
                        1: ['Bahan Exp', 'Kurang Air', 'Serat Kurang'],
                        2: ['Salah Cetak', 'Pecah', 'Melepuh/Gosong', 'Lecet'],
                    }

                    function updateOption() {
                        detailReject.empty();
                        detailReject.append('<option value="" disabled selected>PILIH DETAIL REJECT</option>');

                        if (option[section]) {
                            option[section].forEach(function(item) {
                                detailReject.append(`<option value="${item}">${item}</option>`);
                            });
                        }
                    }

                    // Tampilkan form sesuai section yang dipilih
                    if (section == 1) {
                        $('#inputReject1').show();
                        $('#dataReject').show();
                        $('#QTY').prop('readonly', false);
                        $('#PCS').prop('readonly', true);
                        $('#inputNoMesin').prop('hidden', true);
                        updateOption();

                    } else if (section == 2) {
                        $('#inputReject1').show();
                        $('#dataReject').show();
                        $('#PCS').prop('readonly', false);
                        $('#QTY').prop('readonly', true);
                        $('#inputNoMesin').prop('hidden', false);
                        updateOption();
                    }
                } else {
                    // Jika ada input yang kosong, sembunyikan semua
                    $('#formTitle').text('Input Reject Section');
                    $('#inputReject').hide();
                    $('#inputReject1').hide();
                }
            }

            // Event listener untuk semua input
            $('#section, #tanggal').on('input', function() {
                updateForm();
            });

            updateForm();

            $('#PARTNUMBER').on('input', function() {
                var partnumber = $(this).val();
                if (partnumber.length > 0) {
                    $.ajax({
                        url: "{{ route('fetchData.searchDataReject') }}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            partnumber: partnumber
                        },
                        success: function(response) {
                            console.log(response);
                            $('#dataReject tbody').empty();

                            // Periksa jika response memiliki data
                            if (response.length === 0) {
                                $('#dataReject tbody').append(`
                                    <tr>
                                        <td colspan="5" class="text-center">No data found</td>
                                    </tr>
                                `);
                                return;
                            }

                            response.forEach(function(item) {
                                let radioValue;

                                if (section == 1) {
                                    radioValue =
                                        `${item.PARTNUMBER}|${item.ITEM_ID}|${item.WEIGHT_REJECT}|${item.WO_NUMBER}|${item.SHIFT}`;
                                } else {
                                    radioValue =
                                        `${item.PARTNUMBER}|${item.ITEM_ID}|${item.REJECT}|${item.WO_NUMBER}|${item.SHIFT}`;
                                }

                                $('#dataReject tbody').append(`
                                    <tr>
                                        <td><input type="radio" name="select" value="${radioValue}"></td>
                                        <td>${item.ITEM_ID}</td>
                                        <td>${item.PARTNUMBER}</td>
                                        <td>${item.PARTNAME}</td>
                                        <td>${item.CUSTOMER}</td>
                                    </tr>
                                `);
                            });
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    });
                } else {
                    $('#dataReject tbody').empty();
                }
            });

            // Event listener untuk radio button
            $('#dataReject tbody').on('change', 'input[type="radio"]', function() {
                const data = $(this).val().split('|');
                $('#PARTNUMBER').val(data[0]);
                $('#item_id').val(data[1]);
                $('#MAX_PCS').val(data[2]);
                $('#WO_NUMBER').val(data[3]);
                $('#SHIFT').val(data[4]);
            });


            $('#QTY').on('input', function() {
                const qty = $(this).val();
                const pcs = qty / 2.5;
                $('#PCS').val(pcs.toFixed(2));
            });

            $('#PCS').on('input', function() {
                const pcs = $(this).val();
                const qty = pcs * 2.5;
                $('#QTY').val(qty.toFixed(2));
            });


            // submit form
            $('#submitForm').click(function() {
                const formData = {
                    SECTION: $('#section').val(),
                    TANGGAL: $('#tanggal').val(),
                    PARTNUMBER: $('#PARTNUMBER').val(),
                    ITEM_ID: $('#item_id').val(),
                    PCS: $('#PCS').val(),
                    QTY: $('#QTY').val(),
                    WO_NUMBER: $('#WO_NUMBER').val(),
                    SHIFT: $('#SHIFT').val(),
                    DETAIL_REJECT: $('#DETAIL_REJECT').val(),
                    NO_MESIN: $('#NO_MESIN').val(),
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
    </script>
@endsection
