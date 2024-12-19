<?php

namespace App\Http\Controllers;

use App\Models\Reject;
use App\Models\Product;
use App\Models\Production;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;
use Illuminate\Support\Facades\Response;

class fetchDataController extends Controller
{
    public function dataTableProduction()
    {
        $productions = Production::all();
        return response()->json($productions);
    }

    public function searchDataCF(Request $request)
    {
        $search = $request->input('partnumber');
        $products = Product::where('PARTNUMBER', 'like', "%$search%")->get();
        return response()->json($products);
    }

    // search data reject
    public function searchDataReject(Request $request)
    {
        // $search = $request->input('partnumber', 'section');
        $searchPartnumber = $request->input('partnumber');
        $searchSection = $request->input('section');

        $products = Product::where('PARTNUMBER', 'like', "%$searchPartnumber%")
            ->select('PARTNUMBER', 'CUSTOMER', 'CUST_ID', 'PARTNAME', 'TYPE')
            ->get();

        $rejects = Production::where('PARTNUMBER', 'like', "%$searchPartnumber%")
            ->where('SECTION', '=', $searchSection)
            ->get();

        $data = $rejects->map(function ($reject) use ($products) {
            $product = $products->firstwhere('PARTNUMBER', $reject->PARTNUMBER);
            return [
                'NO_PRODUKSI' => $reject->NO_PRODUKSI,
                'TANGGAL' => $reject->TANGGAL,
                'ITEM_ID' => $reject->ITEM_ID,
                'SHIFT' => $reject->SHIFT,
                'PARTNUMBER' => $reject->PARTNUMBER,
                'OK' => $reject->OK,
                'REJECT' => $reject->REJECT,
                'WEIGHT_OK' => $reject->WEIGHT_OK,
                'WEIGHT_REJECT' => $reject->WEIGHT_REJECT,
                'SECTION' => $reject->SECTION,
                'WO_NUMBER' => $reject->WO_NUMBER,
                'CREATED_DATE' => $reject->CREATED_DATE,
                'LAST_UPDATE' => $reject->LAST_UPDATE,
                'CUSTOMER' => $product->CUSTOMER,
                'CUST_ID' => $product->CUST_ID,
                'PARTNAME' => $product->PARTNAME,
                'TYPE' => $product->TYPE,
            ];
        });

        return response()->json($data);
    }


    // search data hasil reject dan produksi
    public function searchDataRejectMenu(Request $request)
    {
        $searchSection = $request->input('section');
        $searchStartDate = $request->input('start_date') . ' 00:00:00';
        $searchEndDate = $request->input('end_date') . ' 23:59:59';

        $result = Reject::where('SECTION', '=', $searchSection)
            ->whereBetween('created_at', [$searchStartDate, $searchEndDate])
            ->get();

        return response()->json($result);
    }

    public function searchDataGraph(Request $request)
    {
        $searchSection = $request->input('section');
        $searchStartDate = $request->input('start_date') . ' 00:00:00';
        $searchEndDate = $request->input('end_date') . ' 23:59:59';

        // chart 1 : total pcs reject dari section, start date, end date
        $result1 = Reject::where('SECTION', '=', $searchSection)
            ->whereBetween('created_at', [$searchStartDate, $searchEndDate])
            ->selectRaw("CONVERT(VARCHAR, created_at, 105) as date, COUNT(*) as count")
            ->groupBy(DB::raw("CONVERT(VARCHAR, created_at, 105)"))
            ->get();

        $totalReject = ($result1->sum('count') ?? 0);

        // chart 2 : top type reject dari section, start date, end date
        $result2 = Reject::where('SECTION', '=', $searchSection)
            ->whereBetween('created_at', [$searchStartDate, $searchEndDate])
            ->whereNotNull('TYPE') // Abaikan baris dengan TYPE null
            ->select('TYPE', DB::raw('count(*) as total'))
            ->groupBy('TYPE')
            ->orderByDesc('total')
            ->get();

        // Tandai yang teratas
        $result2 = $result2->map(function ($item, $key) use ($result2) {
            return [
                'TYPE' => $item->TYPE,
                'total' => $item->total,
            ];
        });

        // Ambil data teratas (opsional, jika Anda masih butuh dalam variabel terpisah)
        $topType = $result2->first();


        // chart 3 : total detail reject dari section, start date, end date
        $result3 = Reject::where('SECTION', '=', $searchSection)
            ->whereBetween('created_at', [$searchStartDate, $searchEndDate])
            ->select('DETAIL', DB::raw('COUNT(*) as count'))
            ->groupBy('DETAIL')
            ->orderByDesc('count')
            ->get();

        // Tandai data teratas
        $result3 = $result3->map(function ($item, $key) use ($result3) {
            return [
                'DETAIL' => $item->DETAIL,
                'count' => $item->count,
            ];
        });

        // Ambil data teratas (opsional, jika diperlukan variabel khusus)
        $topDetailReject = $result3->first();


        // chart 4 : top partnumber reject dari section, start date, end date
        $result4 = Reject::where('SECTION', '=', $searchSection)
            ->whereBetween('created_at', [$searchStartDate, $searchEndDate])
            ->select('PARTNUMBER', DB::raw('count(*) as total'))
            ->groupBy('PARTNUMBER')
            ->orderByDesc('total')
            ->get();

        // Tandai data teratas
        $result4 = $result4->map(function ($item, $key) use ($result4) {
            return [
                'PARTNUMBER' => $item->PARTNUMBER,
                'total' => $item->total,
            ];
        });

        // Ambil data teratas (opsional, jika Anda tetap ingin memisahkan variabel teratas)
        $topPartNumber = $result4->first();

        // Ambil data produksi (OK dan REJECT) per tanggal
        $result5Production = Production::where('SECTION', '=', $searchSection)
            ->whereBetween('CREATED_DATE', [$searchStartDate, $searchEndDate])
            ->select(
                DB::raw('CONVERT(date, CREATED_DATE) as date'),
                DB::raw('SUM(OK) as total_ok'),
                DB::raw('SUM(REJECT) as total_reject')
            )
            ->groupBy(DB::raw('CONVERT(date, CREATED_DATE)'))  // Mengelompokkan berdasarkan tanggal
            ->orderBy('date', 'asc')  // Mengurutkan berdasarkan tanggal
            ->get();

        // Ambil data reject per tanggal
        $result5Reject = Reject::where('SECTION', '=', $searchSection)
            ->whereBetween('created_at', [$searchStartDate, $searchEndDate])
            ->select(
                DB::raw('CONVERT(date, created_at) as date'),
                DB::raw('SUM(QTY) as jumlah_reject')  // Mengganti alias menjadi jumlah_reject
            )
            ->groupBy(DB::raw('CONVERT(date, created_at)'))  // Mengelompokkan berdasarkan tanggal
            ->orderBy('date', 'asc')  // Mengurutkan berdasarkan tanggal
            ->get();

        // Gabungkan data dari kedua query berdasarkan tanggal
        $result5 = $result5Production->map(function ($productionItem) use ($result5Reject) {
            // Temukan data reject berdasarkan tanggal yang sama
            $rejectItem = $result5Reject->firstWhere('date', $productionItem->date);

            // Jika ada data reject, gabungkan
            $totalReject = $rejectItem ? $rejectItem->jumlah_reject : 0;  // Menggunakan alias jumlah_reject

            // Hitung total produksi
            $totalProduksi = $productionItem->total_ok + $productionItem->total_reject;

            // Hitung persentase reject
            $percentageReject = $totalProduksi > 0 ? ($totalReject / $totalProduksi) * 100 : 0;

            // Tambahkan field baru ke setiap item
            $productionItem->jumlah_reject = $totalReject;  // Menambahkan jumlah_reject
            $productionItem->total_produksi = $totalProduksi;
            $productionItem->percentage_reject = $percentageReject;

            return $productionItem;
        });

        // Ambil data teratas (tanggal dengan produksi terbesar)
        $topProduction = $result5->sortByDesc('total_produksi')->first();  // Mengambil data teratas

        return response()->json([
            'chart1' => [
                'total_reject' => $totalReject,
                'total_pcs' => $result1->map(function ($item) {
                    return [
                        'date' => $item->date,
                        'count' => $item->count,
                    ];
                }),
            ],
            'chart2' => [
                'top_type' => $topType ? [
                    'type' => $topType['TYPE'],
                    'total' => $topType['total'],
                ] : null,
                'data' => $result2,
            ],
            'chart3' => [
                'top_detail' => $topDetailReject ? [
                    'detail' => $topDetailReject['DETAIL'],
                    'count' => $topDetailReject['count'],
                ] : null,
                'data' => $result3,
            ],
            'chart4' => [
                'top_partnumber' => $topPartNumber ? [
                    'partnumber' => $topPartNumber['PARTNUMBER'],
                    'total' => $topPartNumber['total'],
                ] : null,
                'data' => $result4,
            ],
            'chart5' => [
                'top_production' => $topProduction ? [
                    'date' => $topProduction->date,
                    'total_produksi' => $topProduction->total_produksi,
                ] : null,
                'data' => $result5,
            ],
        ]);
    }

    public function exportDataReject(Request $request)
    {
        $searchSection = $request->input('section');
        $searchStartDate = $request->input('start_date') . ' 00:00:00';
        $searchEndDate = $request->input('end_date') . ' 23:59:59';

        $results = Reject::where('SECTION', '=', $searchSection)
            ->whereBetween('created_at', [$searchStartDate, $searchEndDate])
            ->get();

        // Membuat file CSV
        $filename = 'data_reject.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        // Menulis data ke dalam CSV
        $callback = function () use ($results) {
            $file = fopen('php://output', 'w');
            // Header CSV
            fputcsv($file, ['WO_NUMBER', 'ITEM_ID', 'PARTNUMBER', 'TYPE', 'CUSTOMER', 'QTY', 'SECTION', 'DETAIL', 'SHIFT', 'created_at']);

            // Isi data
            foreach ($results as $row) {
                fputcsv($file, [
                    $row->WO_NUMBER,
                    $row->ITEM_ID,
                    $row->PARTNUMBER,
                    $row->TYPE,
                    $row->CUSTOMER,
                    $row->QTY,
                    $row->SECTION,
                    $row->DETAIL,
                    $row->SHIFT,
                    $row->created_at,
                ]);
            }

            fclose($file);
        };

        // Mengembalikan file CSV sebagai respons
        return Response::stream($callback, 200, $headers);
    }
}
