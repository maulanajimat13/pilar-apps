<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Team;
use App\Models\Presenter;
use App\Exports\SaleExport;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.sales.index',[
            'sales' => Sale::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.sales.create',[
            'teams' => Team::all(),
            'presenters' => Presenter::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'team_id' => 'required',
            'bp_id' => 'required',
            'cc' => 'max:255',
            'ecc' => 'max:255',
            'gender' => 'required',
            'age' => 'required',
            'rokok_asal' => 'required',
            'other_info' => 'max:255',
            'clasmild' => 'max:255',
            'redmax' => 'max:255',
            'silver' => 'max:255',
            'image' => 'max:5000'
        ]);

        //memasukan gambar ke folder public post-images
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('sale-images');
        }
        //menyimpan ke db
        Sale::create($validatedData);

        return redirect('/dashboard/sales')->with('success', 'New sales input succeed !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        Sale::destroy($sale->id);
        return redirect('/dashboard/sales')->with('success', 'Sale data has been deleted !');
    }
    
    public function export_excel()
    {
        @dd('tes');
        return Excel::download(new SaleExport, 'sale.xlsx');
    }
}
