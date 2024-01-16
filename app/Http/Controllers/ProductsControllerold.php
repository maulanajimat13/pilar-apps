<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
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


        //memasukan gambar ke folder public post-images
        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }

        //mengambil user id dan excerpt
        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        //menyimpan ke db
        Products::create($validatedData);

        return redirect('/dashboard/products')->with('success', 'New product has been created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {

        // $products = Products::find($product);
        return view('dashboards.products.edit',[
            'product' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (Request $request, Products $products)
    {
        // $products = Products::find($request->product_name);

        dd($products);
        $pName = $products->product_name;
        $pU = $products->unit;
        $pSlug = $pName.$pU;
        $products['product_slug'] = $pSlug;

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

        if($request->product_slug != $products->product_slug) {
            $rules['product_slug'] = 'required|unique:products';
        }

        $validatedData = $request->validate($rules);

        Products::where('id', $products->id)
            ->update($validatedData);

        return redirect('/dashboard/products')->with('success', 'Product has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        Products::destroy($product);

        return redirect('/dashboard/products')->with('success', 'Product has been deleted !');
    }
}
