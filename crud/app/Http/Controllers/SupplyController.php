<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplies = supply::all();
        return view('supplies.index', ['supplies' => $supplies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Name' => 'required|string',
            'Quantity' => 'required|integer|min:1',
            'Description' => 'nullable|string'
        ]);

        $newSupply = Supply::create($data);
        return redirect(route('supply.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supply $supply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supply $supply)
    {
        $data = $request->validate([
            'Name' => 'required|string',
            'Quantity' => 'required|integer|min:1',
            'Description' => 'nullable|string'
        ]);

        $supply->update($data);
        return redirect(route('supply.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supply $supply)
    {
        $supply->delete();
        return redirect(route('supply.index'));
    }
}
