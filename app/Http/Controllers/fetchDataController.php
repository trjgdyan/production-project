<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Production;
use Illuminate\Http\Request;


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
        $search = $request->input('partnumber');
        $rejects = Production::where('PARTNUMBER', 'like', "%$search%")->get();
        return response()->json($rejects);
    }
}
