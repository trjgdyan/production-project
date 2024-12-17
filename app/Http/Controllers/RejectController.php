<?php

namespace App\Http\Controllers;

use App\Models\Reject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRejectRequest;
use App\Http\Requests\UpdateRejectRequest;

class RejectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rejects = Reject::all();
        return view('qc.reject.index', compact('rejects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qc.reject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NO_REJECT' => 'nullable|string|max:255',
            'WO_NUMBER' => 'nullable|string|max:255',
            'ITEM_ID' => 'nullable|string|max:255',
            'PARTNUMBER' => 'nullable|string|max:255',
            'TYPE' => 'nullable|string|max:255',
            'CUSTOMER' => 'nullable|string|max:255',
            'CUST_ID' => 'nullable|string|max:255',
            'QTY' => 'nullable|numeric',
            'PCS' => 'nullable|numeric',
            'SECTION' => 'nullable|string|max:255',
            'DETAIL_REJECT' => 'nullable|string|max:255',
            'OPR_NAME' => 'nullable|string|max:255',
            'SHIFT' => 'nullable|integer',
            'UPDATED_BY' => 'nullable|string|max:255',
            'created_at' => 'nullable|date',
        ]);

        $validated['UPDATED_BY'] = Auth::user()->name;

        $validated['NO_REJECT'] = Reject::max('NO_REJECT');
        $newReject = $validated['NO_REJECT'] ? $validated['NO_REJECT'] + 1 : 1;


        Reject::create([
            'NO_REJECT' => $newReject,
            'WO_NUMBER' => $validated['WO_NUMBER'] ?? null,
            'ITEM_ID' => $validated['ITEM_ID'] ?? null,
            'PARTNUMBER' => $validated['PARTNUMBER'] ?? null,
            'TYPE' => $validated['TYPE'] ?? null,
            'CUSTOMER' => $validated['CUSTOMER'] ?? null,
            'CUST_ID' => $validated['CUST_ID'] ?? null,
            'QTY' => $validated['PCS'] ?? null,
            'WEIGHT' => $validated['QTY'] ?? null,
            'SECTION' => $validated['SECTION'] ?? null,
            'DETAIL' => $validated['DETAIL_REJECT'] ?? null,
            'OPR_NAME' => $validated['OPR_NAME'] ?? null,
            'SHIFT' => $validated['SHIFT'] ?? null,
            'UPDATED_BY' => $validated['UPDATED_BY'] ?? null,
            'created_at' => $validated['created_at'] ?? now(),
        ]);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Reject created successfully.'
            ]);
        }

        return redirect()->route('reject.index')->with('success', 'Reject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reject $reject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reject $reject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRejectRequest $request, Reject $reject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reject $reject)
    {
        //
    }
}
