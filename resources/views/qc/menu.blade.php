@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class=" w-100">
            <div class="d-flex flex-column flex-md-row">
                <div class="w-100 text-center border td-hover bg-primary p-3">
                    <a href="{{ route('productions.index') }}"
                        class="d-flex align-items-center justify-content-center text-white"
                        style="font-weight: bold; text-decoration: none;">
                        <i class="fas fa-edit mr-3" style="font-size: 2.5em;"></i>INPUT PRODUCTION
                    </a>
                </div>
                <div class="w-100 text-center border td-hover bg-primary p-3">
                    <a href="{{ route('rejects.index') }}"
                        class="d-flex align-items-center justify-content-center text-white"
                        style="font-weight: bold; text-decoration: none;">
                        <i class="fas fa-exclamation-triangle mr-3" style="font-size: 3em;"></i>INPUT REJECT
                    </a>
                </div>
            </div>
        </div>

        {{-- CARD --}}
        <div class="container my-3">
            <div class="row g-3">
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="p-3 bg-gradient" style="background-color: #9C27B0; color: white; border-radius: 8px;">
                        <div class="d-flex justify-content-between mb-1">
                            <h6>TOTAL PCS REJECT</h6>
                            <button id="showChart1" style="background: none; border:none"><i class="far fa-eye fa-lg"
                                    style="color: #ffffff;"></i></button>
                        </div>
                        <h1 class="fw-bold mb-0" id="percentChart1">0%</h1>
                        <p class="mb-0" id="textChart1">0 PCS</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="p-3 bg-gradient" style="background-color: #4CAF50; color: white; border-radius: 8px;">
                        <div class="d-flex justify-content-between mb-1">
                            <h6>TOP TYPE REJECT</h6>
                            <button id="showChart2" style="background: none; border:none"><i class="far fa-eye fa-lg"
                                    style="color: #ffffff;"></i></button>
                        </div>
                        <h1 class="fw-bold mb-0" id="percentChart2">0%</h1>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0" id="textChart2">0 PCS</p>
                            <h5 class="mb-0 fw-bold fs-4 text-white" id="topType"></h5>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="p-3 bg-gradient" style="background-color: #FF9800; color: white; border-radius: 8px;">
                        <div class="d-flex justify-content-between mb-1">
                            <h6>TOTAL DETAIL REJECT</h6>
                            <button id="showChart3" style="background: none; border:none"><i class="far fa-eye fa-lg"
                                    style="color: #ffffff;"></i></button>
                        </div>
                        <h1 class="fw-bold mb-0" id="percentChart3">0%</h1>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0" id="textChart3">0 PCS</p>
                            <h5 class="mb-0 fw-bold text-white" id="detailRejectTop"></h5>

                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="p-3 bg-gradient" style="background-color: #424242; color: white; border-radius: 8px;">
                        <div class="d-flex justify-content-between mb-1">
                            <h7>TOP PARTNUMBER REJECT</h7>
                            <button id="showChart4" style="background: none; border:none"><i class="far fa-eye fa-lg"
                                    style="color: #ffffff;"></i></button>
                        </div>
                        <h1 class="fw-bold mb-0" id="percentChart4">0%</h1>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0" id="textChart4">0 PCS</p>
                            <h5 class="mb-0 fw-bold text-white" id="topPartnumberReject"></h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- GRAFIK CHART 1 --}}
        <div class="shadow-sm p-3 mb-3 bg-white rounded" id="CHART1" style="display: none;">
            <div class="d-flex justify-content-center align-items-center mt-3">
                <h5 class="text-primary p-1 text-center" id="titleChart1">TOTAL PCS REJECT</h5>
            </div>
            <div id="chartdiv1" class="w-100"></div>
        </div>

        {{-- GRAFIK CHART 2 --}}
        <div class="shadow-sm p-3 mb-3 bg-white rounded" id="CHART2" style="display: none">
            <div class="d-flex justify-content-center align-items-center mt-3">
                <h5 class="text-primary p-1 text-center" id="titleChart2">TOP TYPE REJECT</h5>
            </div>
            <div id="chartdiv2" class="w-100"></div>
        </div>

        {{-- GRAFIK CHART 3 --}}
        <div class="shadow-sm p-3 mb-3 bg-white rounded" id="CHART3" style="display: none">
            <div class="d-flex justify-content-center align-items-center mt-3">
                <h5 class="text-primary p-1 text-center" id="titleChart3">TOTAL DETAIL REJECT</h5>
            </div>
            <div id="chartdiv3" class="w-100"></div>
        </div>

        {{-- GRAFIK CHART 4 --}}
        <div class="shadow-sm p-3 mb-3 bg-white rounded" id="CHART4" style="display: none">
            <div class="d-flex justify-content-center align-items-center mt-3">
                <h5 class="text-primary p-1 text-center" id="titleChart4">TOTAL PARTNUMBER REJECT</h5>
            </div>
            <div id="chartdiv4" class="w-100"></div>
        </div>

        {{-- GRAFIK TOTAL - CHART 5 --}}
        <div class="shadow-sm p-3 mb-3 bg-white rounded" id="CHART5" style="display: none;">
            <div class="d-flex justify-content-center align-items-center mt-3">
                <h5 class="text-primary p-1 text-center" id="titleChart5">TOTAL HASIL PRODUKSI & REJECT</h5>
            </div>
            <div id="chartdiv5" class="w-100"></div>
        </div>


        {{-- PILIH SECTION --}}
        <div class="shadow-sm p-3 mb-3 bg-white rounded">
            <div class="d-flex justify-content-between align-items-center mt-3 bg-success">
                <h5 class="text-white p-1">PILIH SECTION</h5>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="section" class="font-weight-bold">Section</label>
                        <select class="form-control" id="section">
                            <option value="" disabled selected>SELECT SECTION</option>
                            <option value="RAW MATERIAL">RAW MATERIAL</option>
                            <option value="FINISH GOOD">FINISH GOOD</option>
                        </select>
                    </div>
                    @error('sectiom')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="start_date" class="font-weight-bold">Start Period</label>
                        <input type="date" class="form-control" id="start_date">
                    </div>
                    @error('start_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="end_date" class="font-weight-bold">End Period</label>
                        <input type="date" class="form-control" id="end_date">
                    </div>
                    @error('end_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="btn btn-primary" id="searchBtn" disabled>
                        <i class="fas fa-search"></i>
                    </button>
                </div>

            </div>
        </div>

        {{-- header --}}
        <div class="d-flex justify-content-between align-items-center mt-3 bg-primary">
            <h5 class="text-white p-1">REJECT DATA LIST</h5>
            <a href="" id="exportData" class="mr-2"><i class="fa-solid fa-cloud-arrow-down fa-2xl"
                    style="color: #FFD43B;"></i></a>
        </div>

        {{-- TABLE --}}
        <table id="dataTableReject" class="table table-bordered table-hover overflow-auto">
            <thead class="bg-primary">
                <tr>
                    <th class="text-center text-white">NO REJECT</th>
                    <th class="text-center text-white">TANGGAL</th>
                    <th class="text-center text-white">ITEM ID</th>
                    <th class="text-center text-white">PARTNUMBER</th>
                    <th class="text-center text-white">TYPE</th>
                    <th class="text-center text-white">CUSTOMER</th>
                    <th class="text-center text-white">QTY</th>
                    <th class="text-center text-white">DETAIL</th>
                    {{-- <th class="text-center text-white">ACTION</th> --}}
                </tr>
            </thead>

        </table>
    </div>

    <style>
        .td-hover:hover {
            background-color: #4a6fad !important;
            transition: background-color 0.3s ease;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            let dataTableReject = $('#dataTableReject').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "scrollX": true,
            });

            function formatDate(dateString) {
                return moment(dateString).format('DD-MM-YYYY');
            }

            // Enable tombol hanya jika semua input tersedia
            $('#section, #start_date, #end_date').on('input change', function() {
                const section = $('#section').val();
                const start_date = $('#start_date').val();
                const end_date = $('#end_date').val();

                $('#searchBtn').prop('disabled', !(section && start_date && end_date));
            });

            // Tambahkan handler untuk tombol search
            $('#searchBtn').click(function() {
                const section = $('#section').val();
                const start_date = $('#start_date').val();
                const end_date = $('#end_date').val();

                let token = $('meta[name="csrf-token"]').attr('content');

                //request data untuk table
                $.ajax({
                    url: '{{ route('fetchData.searchDataRejectMenu') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: {
                        section: section,
                        start_date: start_date,
                        end_date: end_date
                    },
                    success: function(response) {
                        console.log(response);
                        $('#dataTableReject tbody').empty();

                        // Jika ada data, tampilkan
                        if (response.length > 0) {
                            response.forEach(function(item) {
                                $('#dataTableReject tbody').append(`
                                    <tr>
                                        <td class="text-center">${item.NO_REJECT}</td>
                                        <td class="text-center">${formatDate(item.created_at)}</td>
                                        <td class="text-center">${item.ITEM_ID}</td>
                                        <td class="text-center">${item.PARTNUMBER}</td>
                                        <td class="text-center">${item.TYPE}</td>
                                        <td class="text-center">${item.CUSTOMER}</td>
                                        <td class="text-center">${item.WEIGHT}</td>
                                        <td class="text-center">${item.DETAIL}</td>

                                    </tr>
                                `);
                            });
                        } else {
                            // Jika data kosong
                            $('#dataTableReject tbody').append(`
                        <tr>
                            <td colspan="9" class="text-center">Data Not Found</td>
                        </tr>
                    `);
                        }
                    },
                    error: function(error) {
                        console.error(error.responseText);
                        alert('error.responseJSON.message');
                    }
                });

                // request data untuk chart
                $.ajax({
                    url: '{{ route('fetchData.searchDataGraph') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: {
                        section: section,
                        start_date: start_date,
                        end_date: end_date
                    },
                    success: function(response) {
                        console.log(response);
                        //chart 1
                        $('#textChart1').text(response.chart1.total_reject + ' PCS');
                        let percentChart1 = (response.chart1.total_reject / response.chart5
                            .top_production.total_produksi) * 100;
                        $('#percentChart1').text(percentChart1.toFixed(2) + '%');

                        //chart 2
                        if (response.chart2.top_type && response.chart2.top_type.total &&
                            response.chart2.top_type.type) {
                            $('#textChart2').text(response.chart2.top_type.total + ' PCS');
                            $('#topType').text(response.chart2.top_type.type);
                            let percentChart2 = (response.chart2.top_type.total / response
                                .chart5.top_production.total_produksi) * 100;
                            $('#percentChart2').text(percentChart2.toFixed(2) + '%');
                        } else {
                            $('#textChart2').text('0');
                            $('#topType').text('-');
                        }

                        //chart 3
                        $('#textChart3').text(response.chart3.top_detail.count + ' PCS');
                        $('#detailRejectTop').text(response.chart3.top_detail.detail);
                        let percentChart3 = (response.chart3.top_detail.count / response.chart5
                            .top_production.total_produksi) * 100;
                        $('#percentChart3').text(percentChart3.toFixed(2) + '%');

                        //chart 4
                        $('#textChart4').text(response.chart4.top_partnumber.total + ' PCS');
                        $('#topPartnumberReject').text(response.chart4.top_partnumber
                            .partnumber);
                        let percentChart4 = (response.chart4.top_partnumber.total / response
                            .chart5.top_production.total_produksi) * 100;
                        $('#percentChart4').text(percentChart4.toFixed(2) + '%');

                        // SETTING TAMPIAN CHART
                        // SETTING TAMPIAN CHART
                        // SETTING TAMPIAN CHART

                        // Show chart 1 and chart 5
                        $('#showChart1').click(function() {
                            $('#CHART1').css('display', 'block'); // Show chart 1
                            $('#CHART5').css('display', 'block'); // Always show chart 5
                            // Hide other charts
                            $('#CHART2').css('display', 'none');
                            $('#CHART3').css('display', 'none');
                            $('#CHART4').css('display', 'none');
                        });

                        // Show chart 2 and chart 5
                        $('#showChart2').click(function() {
                            $('#CHART1').css('display', 'none'); // Hide chart 1
                            $('#CHART2').css('display', 'block'); // Show chart 2
                            $('#CHART5').css('display', 'block'); // Always show chart 5
                            // Hide other charts
                            $('#CHART3').css('display', 'none');
                            $('#CHART4').css('display', 'none');
                        });

                        // Show chart 3 and chart 5
                        $('#showChart3').click(function() {
                            $('#CHART1').css('display', 'none'); // Hide chart 1
                            $('#CHART2').css('display', 'none'); // Hide chart 2
                            $('#CHART3').css('display', 'block'); // Show chart 3
                            $('#CHART5').css('display', 'block'); // Always show chart 5
                            // Hide other charts
                            $('#CHART4').css('display', 'none');
                        });

                        // Show chart 4 and chart 5
                        $('#showChart4').click(function() {
                            $('#CHART1').css('display', 'none'); // Hide chart 1
                            $('#CHART2').css('display', 'none'); // Hide chart 2
                            $('#CHART3').css('display', 'none'); // Hide chart 3
                            $('#CHART4').css('display', 'block'); // Show chart 4
                            $('#CHART5').css('display', 'block'); // Always show chart 5
                        });


                        // CHART START
                        // CHART START
                        // CHART START

                        am4core.useTheme(am4themes_animated);

                        // ================ CHART 1 ================
                        var chart1 = am4core.create("chartdiv1", am4charts.XYChart3D);
                        document.getElementById("chartdiv1").style.height = "500px";

                        // Data diambil dari response AJAX
                        chart1.data = response.chart1.total_pcs;

                        // Axis X (Category Axis)
                        var categoryAxis = chart1.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.dataFields.category = "date"; // Ubah ke "date"
                        categoryAxis.renderer.grid.template.location = 0;
                        categoryAxis.renderer.minGridDistance = 30;
                        categoryAxis.title.text = "Tanggal";

                        // Axis Y (Value Axis)
                        var valueAxis = chart1.yAxes.push(new am4charts.ValueAxis());
                        valueAxis.renderer.inversed = false; // Jangan dibalik
                        valueAxis.min = 0;
                        valueAxis.title.text = "Jumlah Reject";

                        // Create Series
                        var series = chart1.series.push(new am4charts.ColumnSeries3D());
                        series.dataFields.valueY = "count"; // Gunakan "count" dari data
                        series.dataFields.categoryX = "date"; // Gunakan "date" dari data
                        series.name = "Jumlah Reject";
                        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";

                        // Tooltip Settings
                        series.tooltip.label.fontSize = 12;
                        series.tooltip.label.fill = am4core.color("#fff");
                        series.fill = am4core.color("#9C27B0");

                        // Add a legend
                        chart1.legend = new am4charts.Legend();
                        chart1.legend.position = "bottom";

                        // Scrollbar
                        chart1.scrollbarX = new am4core.Scrollbar();


                        // ================ CHART 2 ================
                        var chart2 = am4core.create("chartdiv2", am4charts.XYChart3D);
                        document.getElementById("chartdiv2").style.height = "500px";

                        // Data diambil dari response AJAX
                        chart2.data = response.chart2.data;

                        // Axis X (Category Axis)
                        var categoryAxis = chart2.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.dataFields.category = "TYPE"; // Ubah ke "date"
                        categoryAxis.renderer.grid.template.location = 0;
                        categoryAxis.renderer.minGridDistance = 30;
                        categoryAxis.title.text = "Type";

                        // Axis Y (Value Axis)
                        var valueAxis = chart2.yAxes.push(new am4charts.ValueAxis());
                        valueAxis.renderer.inversed = false; // Jangan dibalik
                        valueAxis.min = 0;
                        valueAxis.title.text = "Jumlah Reject";

                        // Create Series
                        var series = chart2.series.push(new am4charts.ColumnSeries3D());
                        series.dataFields.valueY = "total"; // Gunakan "count" dari data
                        series.dataFields.categoryX = "TYPE"; // Gunakan "date" dari data
                        series.name = "Jumlah";
                        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";

                        // Tooltip Settings
                        series.tooltip.label.fontSize = 12;
                        series.tooltip.label.fill = am4core.color("#fff");
                        series.fill = am4core.color("#4CAF50");

                        // Add a legend
                        chart2.legend = new am4charts.Legend();
                        chart2.legend.position = "bottom";

                        // Scrollbar
                        chart2.scrollbarX = new am4core.Scrollbar();


                        // ================ CHART 3 ================
                        var chart3 = am4core.create("chartdiv3", am4charts.XYChart3D);
                        document.getElementById("chartdiv3").style.height = "500px";

                        // Data diambil dari response AJAX
                        chart3.data = response.chart3.data;

                        // Axis X (Category Axis)
                        var categoryAxis = chart3.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.dataFields.category = "DETAIL"; // Ubah ke "date"
                        categoryAxis.renderer.grid.template.location = 0;
                        categoryAxis.renderer.minGridDistance = 30;
                        categoryAxis.title.text = "Detail Reject";

                        // Axis Y (Value Axis)
                        var valueAxis = chart3.yAxes.push(new am4charts.ValueAxis());
                        valueAxis.renderer.inversed = false; // Jangan dibalik
                        valueAxis.min = 0;
                        valueAxis.title.text = "Jumlah Reject";

                        // Create Series
                        var series = chart3.series.push(new am4charts.ColumnSeries3D());
                        series.dataFields.valueY = "count"; // Gunakan "count" dari data
                        series.dataFields.categoryX = "DETAIL"; // Gunakan "date" dari data
                        series.name = "Jumlah";
                        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";

                        // Tooltip Settings
                        series.tooltip.label.fontSize = 12;
                        series.tooltip.label.fill = am4core.color("#fff");
                        series.fill = am4core.color("#FF9800");

                        // Add a legend
                        chart3.legend = new am4charts.Legend();
                        chart3.legend.position = "bottom";

                        // Scrollbar
                        chart3.scrollbarX = new am4core.Scrollbar();


                        // ================ CHART 4 ================
                        var chart4 = am4core.create("chartdiv4", am4charts.XYChart3D);
                        document.getElementById("chartdiv4").style.height = "500px";

                        // Data diambil dari response AJAX
                        chart4.data = response.chart4.data;

                        // Axis X (Category Axis)
                        var categoryAxis = chart4.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.dataFields.category = "PARTNUMBER"; // Ubah ke "date"
                        categoryAxis.renderer.grid.template.location = 0;
                        categoryAxis.renderer.minGridDistance = 30;
                        categoryAxis.title.text = "Partnumber";

                        // Axis Y (Value Axis)
                        var valueAxis = chart4.yAxes.push(new am4charts.ValueAxis());
                        valueAxis.renderer.inversed = false; // Jangan dibalik
                        valueAxis.min = 0;
                        valueAxis.title.text = "Jumlah Reject";

                        // Create Series
                        var series = chart4.series.push(new am4charts.ColumnSeries3D());
                        series.dataFields.valueY = "total"; // Gunakan "count" dari data
                        series.dataFields.categoryX = "PARTNUMBER"; // Gunakan "date" dari data
                        series.name = "Jumlah";
                        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";

                        // Tooltip Settings
                        series.tooltip.label.fontSize = 12;
                        series.tooltip.label.fill = am4core.color("#fff");
                        series.fill = am4core.color("#424242");

                        // Add a legend
                        chart4.legend = new am4charts.Legend();
                        chart4.legend.position = "bottom";

                        // Scrollbar
                        chart4.scrollbarX = new am4core.Scrollbar();


                        // ================ CHART 5 ================
                        // console.log(response.chart5.data); // Debug: Verify data format

                        var chart = am4core.create("chartdiv5", am4charts.XYChart3D);
                        document.getElementById("chartdiv5").style.height = "500px";


                        chart.data = response.chart5.data;

                        // Ensure the data is in the correct format
                        chart.data = chart.data.map(function(item) {
                            // Convert date string to Date object if necessary
                            if (typeof item.date === "string") {
                                item.date = new Date(item.date);
                            }
                            return item;
                        });

                        // Date Axis
                        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                        dateAxis.renderer.grid.template.location = 0;
                        dateAxis.renderer.minGridDistance = 30;
                        dateAxis.title.text = "Date";
                        dateAxis.title.fontWeight = "bold";
                        dateAxis.dateFormatter.inputDateFormat = "yyyy-MM-dd";
                        dateAxis.dateFormats.setKey("day", "yyyy-MM-dd");
                        dateAxis.periodChangeDateFormats.setKey("day", "yyyy-MM-dd");
                        dateAxis.renderer.labels.template.fontSize = 16;

                        // Value Axis for Production Data
                        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                        valueAxis.title.text = "Jumlah Hasil Produksi";
                        valueAxis.title.fontWeight = "bold";
                        valueAxis.renderer.labels.template.fontSize = 16;
                        // valueAxis.min = 0; // Set the minimum value to 0

                        // Secondary Value Axis for Reject Percentage
                        var secondaryAxis = chart.yAxes.push(new am4charts.ValueAxis());
                        secondaryAxis.renderer.opposite = true;
                        secondaryAxis.title.text = "Jumlah Persentase Reject";
                        secondaryAxis.title.fontWeight = "bold";
                        secondaryAxis.renderer.labels.template.fontSize = 16;
                        secondaryAxis.syncWithAxis = valueAxis;
                        secondaryAxis.min = valueAxis.min;
                        let maxValue = valueAxis.max;

                        // Ensure secondary axis maximum is adjusted properly
                        secondaryAxis.max = Math.ceil(maxValue / 10) * 10;
                        if (secondaryAxis.max < maxValue + 5) {
                            secondaryAxis.max += 10;
                        }

                        // Use a custom adapter to rescale the secondary axis
                        let scaleFactor = 50; // Adjust scale factor
                        secondaryAxis.strictMinMax = true;
                        secondaryAxis.renderer.minGridDistance = valueAxis.renderer
                            .minGridDistance;

                        // Formatter for secondary axis
                        secondaryAxis.numberFormatter = new am4core.NumberFormatter();
                        secondaryAxis.numberFormatter.numberFormat = "#.#'%";

                        // Column Series for production data
                        var columnSeries = chart.series.push(new am4charts.ColumnSeries3D());
                        columnSeries.dataFields.valueY = "total_produksi";
                        columnSeries.dataFields.dateX = "date";
                        columnSeries.name = "Jumlah Hasil Produksi";
                        columnSeries.tooltip.fontSize = 16;
                        columnSeries.tooltipText = "{name}: [bold]{valueY}[/]";
                        columnSeries.columns.template.width = am4core.percent(60);
                        columnSeries.columns.template.tooltipText = "{name}: {valueY.value}";

                        // Line Series for reject percentage
                        var lineSeries = chart.series.push(new am4charts.LineSeries());
                        lineSeries.dataFields.valueY = "percentage_reject";
                        lineSeries.dataFields.dateX = "date";
                        lineSeries.yAxis = secondaryAxis; // Link to secondary Y-axis
                        lineSeries.name = "Persentase Reject";
                        lineSeries.strokeWidth = 3;
                        lineSeries.stroke = am4core.color("#f57056");
                        lineSeries.tooltip.fontSize = 16;
                        lineSeries.tooltipText =
                            "{name}: [bold]{valueY.value}%[/]\nJumlah Reject: [bold]{jumlah_reject}[/]";
                        lineSeries.fill = am4core.color("#f57056");

                        // Add bullets to Line Series
                        var bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
                        bullet.circle.radius = 4;
                        bullet.circle.stroke = am4core.color("#fff");
                        bullet.circle.strokeWidth = 2;

                        // Add legend
                        chart.legend = new am4charts.Legend();
                        chart.legend.labels.template.fontSize = 16;

                        // Add cursor
                        chart.cursor = new am4charts.XYCursor();
                        chart.cursor.lineX.strokeOpacity = 0;
                        chart.cursor.lineY.strokeOpacity = 0;

                        chart.cursor.events.on("cursorpositionchanged", function() {
                            chart.yAxes.each(function(axis) {
                                axis.tooltip.disabled = true;
                            });
                        });

                        // Scrollbar
                        chart.scrollbarX = new am4core.Scrollbar();
                        var scrollbarY = new am4core.Scrollbar();
                        scrollbarY.parent = chart.leftAxesContainer;
                        scrollbarY.toBack();
                        chart.scrollbarY = scrollbarY;

                        var scrollbarYRight = new am4core.Scrollbar();
                        scrollbarYRight.parent = chart.rightAxesContainer;
                        scrollbarYRight.toBack();
                        secondaryAxis.scrollbar = scrollbarYRight;


                    },
                    error: function(error) {
                        console.error(error.responseText);
                        alert('error.responseJSON.message');
                    }
                });

            });

            // event handler button export data
            $('#exportData').click(function(e) {
                e.preventDefault(); // Mencegah reload halaman

                let section = $('#section').val();
                let start_date = $('#start_date').val();
                let end_date = $('#end_date').val();

                if (section && start_date && end_date) {
                    $.ajax({
                        url: '{{ route('fetchData.exportDataReject') }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            section: section,
                            start_date: start_date,
                            end_date: end_date
                        },
                        xhrFields: {
                            responseType: 'blob' // Mengatur tipe respons untuk menangani file
                        },
                        success: function(blob) {
                            // Membuat elemen <a> untuk mengunduh file
                            const url = window.URL.createObjectURL(blob);
                            const link = document.createElement('a');
                            link.href = url;
                            link.download = 'data_reject.csv';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                            window.URL.revokeObjectURL(
                                url);
                        },
                        error: function(error) {
                            console.error(error.responseText);
                            alert('Error: ' + (error.responseJSON?.message ||
                                'An error occurred.'));
                        }
                    });
                } else {
                    alert('Lengkapi Data sebelum Export');
                }
            });





        });
    </script>



@endsection
