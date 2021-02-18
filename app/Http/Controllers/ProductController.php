<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation;
use Bezhanov\Faker\Provider\Commerce;
use Bezhanov\Faker\Provider as CategoryList;
use Bezhanov\Faker\ProviderCollectionHelper;

class ProductController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->except(['allProduct', 'productDescription', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list');
    }
    public function createView()
    {
        return view('create');
    }
    public function allProduct()
    {

        $products = DB::table('products')->get()->all();
        return response()->json($products, 200);
    }
    public function productDescription()
    {
        $department = ["Books", "Movies", "Music", "Games", "Electronics", "Computers", "Home", "Garden", "Tools", "Grocery", "Health", "Beauty", "Toys", "Kids", "Baby", "Clothing", "Shoes", "Jewelry", "Sports", "Outdoors", "Automotive", "Industrial"];
        return response()->json($department, 200);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return "ok";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required|max:255',
            'datetime' => 'required|date'
        ]);
        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'datetime' => $request->datetime
        ]);
        return view('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required|max:255',
            'datetime' => 'required|date'
        ]);
        $product = Product::find($request->id);
        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'datetime' => $request->datetime
        ]);
        return "ok";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
}
