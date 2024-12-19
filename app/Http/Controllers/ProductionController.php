<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productions = Production::all();
        // dd($productions);
        return view('qc.production.index', compact('productions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qc.production.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('data received'. $request->all());

        $validated = $request->validate([
            'ITEM_ID' => 'nullable|string|max:255',
            'TANGGAL' => 'nullable|date',
            'SHIFT' => 'nullable|integer',
            'PARTNUMBER' => 'nullable|string|max:255',
            'LOT' => 'nullable|integer',
            'CUST_ID' => 'nullable|string|max:255',
            'ORDER_ID' => 'nullable|string|max:255',
            'OK' => 'nullable|numeric',
            'REJECT' => 'nullable|numeric',
            'WEIGHT_OK' => 'nullable|numeric',
            'WEIGHT_REJECT' => 'nullable|numeric',
            'STATUS' => 'nullable|string|max:255',
            'SECTION' => 'nullable|string|max:255',
            'WO_NUMBER' => 'nullable|string|max:255',
            'CREATED_DATE' => 'nullable|date',
            'LAST_UPDATE' => 'nullable|date',
            'CREATED_BY' => 'nullable|string|max:255',
            'UPDATED_BY' => 'nullable|string|max:255',
        ]);

        $lastProduction = Production::max('NO_PRODUKSI');
        $newProduction = $lastProduction ? $lastProduction + 1 : 1;

        $validated['CREATED_BY'] = Auth::user()->name;
        $validated['UPDATED_BY'] = Auth::user()->name;

        Production::create([
            'NO_PRODUKSI' => $newProduction,
            'TANGGAL' => $validated['TANGGAL'] ?? now(),
            'ITEM_ID' => $validated['ITEM_ID'] ?? null,
            'SHIFT' => $validated['SHIFT'] ?? null,
            'PARTNUMBER' => $validated['PARTNUMBER'] ?? null,
            'LOT' => $validated['LOT'] ?? null,
            'CUST_ID' => $validated['CUST_ID'] ?? null,
            'ORDER_ID' => $validated['ORDER_ID'] ?? null,
            'OK' => $validated['OK'] ?? null,
            'REJECT' => $validated['REJECT'] ?? null,
            'WEIGHT_OK' => $validated['WEIGHT_OK'] ?? null,
            'WEIGHT_REJECT' => $validated['WEIGHT_REJECT'] ?? null,
            'STATUS' => $validated['STATUS'] ?? null,
            'SECTION' => $validated['SECTION'] ?? null,
            'WO_NUMBER' => $validated['WO_NUMBER'] ?? null,
            'CREATED_DATE' => $validated['CREATED_DATE'] ?? now(),
            'LAST_UPDATE' => $validated['LAST_UPDATE'] ?? now(),
            'CREATED_BY' => $validated['CREATED_BY'] ?? null,
            'UPDATED_BY' => $validated['UPDATED_BY'] ?? null,
        ]);

        return redirect()->route('productions.index')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Production $production)
    {
        $production = Production::findOrFail($production->NO_PRODUKSI);
        return view('qc.production.edit', compact('production'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Production $production)
    {
        $validated = $request->validate([
            'ITEM_ID' => 'nullable|string|max:255',
            'TANGGAL' => 'nullable|date',
            'SHIFT' => 'nullable|integer',
            'PARTNUMBER' => 'nullable|string|max:255',
            'LOT' => 'nullable|integer',
            'CUST_ID' => 'nullable|string|max:255',
            'ORDER_ID' => 'nullable|string|max:255',
            'OK' => 'nullable|numeric',
            'REJECT' => 'nullable|numeric',
            'WEIGHT_OK' => 'nullable|numeric',
            'WEIGHT_REJECT' => 'nullable|numeric',
            'STATUS' => 'nullable|string|max:255',
            'SECTION' => 'nullable|string|max:255',
            'WO_NUMBER' => 'nullable|string|max:255',
            'CREATED_DATE' => 'nullable|date',
            'LAST_UPDATE' => 'nullable|date',
            'CREATED_BY' => 'nullable|string|max:255',
            'UPDATED_BY' => 'nullable|string|max:255',
        ]);

        $production = Production::findOrFail($production->NO_PRODUKSI);
        $production->update($validated);

        return response()->json(['success' => 'Data berhasil diupadate']);
        return redirect()->route('productions.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $production)
    {
        $production = Production::findOrFail($production->NO_PRODUKSI);
        $production->delete();
        return redirect()->route('productions.index')->with('success', 'Data berhasil dihapus');
    }
}
