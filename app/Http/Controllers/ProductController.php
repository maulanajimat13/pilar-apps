<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.products.index',[
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.products.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // mengambil nama produk dan unit untuk digabung menjadi slug
        $pName = $request['product_name'];
        $u = $request['unit'];
        $slug = $pName.$u;

        $request['product_slug'] = $slug;

        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'brand' => 'required',
            'unit' => 'required',
            'product_slug' => 'required|unique:products',
            'price' => 'required|numeric'
        ]);


        //menyimpan ke db
        Product::create($validatedData);

        return redirect('/dashboard/products')->with('success', 'New product has been created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboards.products.edit',[
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $pName = $product->product_name;
        $pU = $product->unit;
        $pSlug = $pName.$pU;
        $product['product_slug'] = $pSlug;

        $rName = $request['product_name'];
        $rU = $request['unit'];
        $rSlug = $rName.$rU;

        $request['product_slug'] = $rSlug;

        $rules = [
            'product_name' => 'required|max:255',
            'brand' => 'required',
            'unit' => 'required',
            'price' => 'required|numeric'
        ];

        if($request->product_slug != $product->product_slug) {
            $rules['product_slug'] = 'required|unique:products';
        }

        $validatedData = $request->validate($rules);

        Product::where('id', $product->id)
            ->update($validatedData);

        return redirect('/dashboard/products')->with('success', 'Product has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        return redirect('/dashboard/products')->with('success', 'Product has been deleted !');
    }
}
