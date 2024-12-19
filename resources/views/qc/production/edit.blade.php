@extends('layouts.app')
@section('title', 'Edit Data Production')

@section('content')
    <form id="productionForm" method="POST" action="{{ route('productions.update', $production->NO_PRODUKSI) }}">
        @csrf
        @method('PUT')
        {{-- PILIH SECTION, SHIFT, TANGGAL --}}
        <a href="{{ route('productions.index') }}" class="btn btn-primary">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div class="shadow-sm p-3 mb-3 bg-white rounded" id="inputProductionSection">
            <div class="d-flex justify-content-between align-items-center mt-3 bg-success">
                <h5 class="text-white p-1">Edit Produksi</h5>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="section" class="font-weight-bold">Section</label>
                        <select class="form-control" name="SECTION" id="section" disabled>
                            <option value="">Pilih Section</option>
                            <option value="RAW MATERIAL" {{ old('SECTION', $production->SECTION) == 'RAW MATERIAL' ? 'selected' : '' }}>
                                RAW MATERIAL</option>
                            <option value="FINISH GOOD" {{ old('SECTION', $production->SECTION) == 'FINISH GOOD' ? 'selected' : '' }}>
                                FINISH GOOD</option>
                        </select>
                    </div>
                    @error('SECTION')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal" class="font-weight-bold">Tanggal</label>
                        <input type="date" class="form-control" name="TANGGAL" id="tanggal"
                            value="{{ old('TANGGAL', \Carbon\Carbon::parse($production->CREATED_DATE)->format('Y-m-d')) }}">
                    </div>
                    @error('TANGGAL')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="shift" class="font-weight-bold">Shift</label>
                        <input type="number" class="form-control" name="SHIFT" id="shift" placeholder="INPUT SHIFT"
                            value="{{ old('SHIFT', $production->SHIFT) }}">
                    </div>
                    @error('SHIFT')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- FORM INPUT PRODUKSI --}}
        <div class="shadow-sm p-3 mb-3 bg-white rounded" id="inputProduction">
            <div class="d-flex justify-content-between align-items-center mt-3 bg-warning">
                <h5 class="text-white p-1" id="formTitle">Edit Produksi Section</h5>
            </div>
            <div class="row mt-2" id="inputProduction1">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="WO_NUMBER" class="font-weight-bold">No.WO</label>
                        <input type="text" name="WO_NUMBER" class="form-control" id="WO_NUMBER" placeholder="INPUT NO.WO"
                            value="{{ old('WO_NUMBER', $production->WO_NUMBER) }}">
                    </div>
                    @error('WO_NUMBER')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="partnumber" class="font-weight-bold">Partnumber</label>
                        <input type="text" name="PARTNUMBER" class="form-control" id="partnumber"
                            placeholder="INPUT PARTNUMBER" value="{{ old('PARTNUMBER', $production->PARTNUMBER) }}"
                            disabled>
                    </div>
                    @error('PARTNUMBER')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="item_id" class="font-weight-bold">Item ID</label>
                        <input type="text" name="ITEM_ID" class="form-control" id="item_id" placeholder="INPUT ITEM ID"
                            value="{{ old('ITEM_ID', $production->ITEM_ID) }}" disabled>
                    </div>
                    @error('ITEM_ID')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="weightOK" class="font-weight-bold">Weight OK</label>
                        <div class="input-group">
                            <input type="float" name="WEIGHT_OK" class="form-control" id="weightOK"
                                placeholder="INPUT WEIGHT OK" value="{{ old('WEIGHT_OK', $production->WEIGHT_OK) }}">
                            <div class="input-group-append">
                                <span class="input-group-text">KG</span>
                            </div>
                        </div>
                    </div>
                    @error('WEIGHT_OK')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="qtyOK" class="font-weight-bold">QTY OK</label>
                        <div class="input-group">
                            <input type="number" name="OK" class="form-control" id="qtyOK"
                                placeholder="INPUT QTY OK" value="{{ old('OK', $production->OK) }}" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">PCS</span>
                            </div>
                        </div>
                    </div>
                    @error('OK')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="weightReject" class="font-weight-bold">Weight Reject</label>
                        <div class="input-group">
                            <input type="float" name="WEIGHT_REJECT" class="form-control" id="weightReject"
                                placeholder="INPUT WEIGHT REJECT"
                                value="{{ old('WEIGHT_REJECT', $production->WEIGHT_REJECT) }}" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">KG</span>
                            </div>
                        </div>
                    </div>
                    @error('WEIGHT_REJECT')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="qtyReject" class="font-weight-bold">QTY REJECT</label>
                        <div class="input-group">
                            <input type="number" name="REJECT" class="form-control" id="qtyReject"
                                placeholder="INPUT QTY REJECT" value="{{ old('REJECT', $production->REJECT) }}" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">PCS</span>
                            </div>
                        </div>
                    </div>
                    @error('REJECT')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-end">
            <button class="btn btn-warning" id="btnUpdate" type="submit">Update</button>
        </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            if ($('#section').val() == 'RAW MATERIAL') {
                $('#weightOK').removeAttr('readonly');
                $('#weightReject').removeAttr('readonly');
            } else if ($('#section').val() == 'FINISH GOOD') {
                $('#weightOK').attr('readonly', true);
                $('#weightReject').attr('readonly', true);
                $('#qtyOK').removeAttr('readonly');
                $('#qtyReject').removeAttr('readonly');
            }


            // perhitungan qty dari on.input weight di section 1
            $('#weightOK').on('input', function() {
                let weightOK = $(this).val();
                let qtyOK = weightOK * 2.5;
                $('#qtyOK').val(qtyOK.toFixed(0));
            });

            $('#weightReject').on('input', function() {
                let weightReject = $(this).val();
                let qtyReject = weightReject * 2.5;
                $('#qtyReject').val(qtyReject.toFixed(0));
            });

            // perhitungan weight dari on.input qty di section 2
            $('#qtyOK').on('input', function() {
                let qtyOK = $(this).val();
                let weightOK = qtyOK / 2.5;
                $('#weightOK').val(weightOK.toFixed(2));
            });

            $('#qtyReject').on('input', function() {
                let qtyReject = $(this).val();
                let weightReject = qtyReject / 2.5;
                $('#weightReject').val(weightReject.toFixed(2));
            });


            // event handler button update
            $('#btnUpdate').on('click', function() {
                let form = $('#productionForm');
                let url = form.attr('action');
                let data = form.serialize();
                let token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        // alert('Data berhasil diupdate');
                        window.location.href = '{{ route('productions.index') }}';
                    },
                    error: function(xhr) {
                        alert('Data gagal diupdate');
                        console.log(xhr.responseText);
                    }
                })
            })

        });
    </script>
@endsection
