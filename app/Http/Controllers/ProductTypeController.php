<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        return view('main', ['producttypes' => ProductType::take(10)->get(), 'products' => Product::paginate(15)]);
    }

    public function about()
    {
        return view('about');
    }
    public function contacts()
    {
        return view('contacts');
    }

    public function show($id)
    {
        return view('main', ['producttypes' => ProductType::take(7)->get(), 'products' => Product::where('producttype_id', $id)->paginate(15), 'category'=>ProductType::findOrFail($id)]);
    }

    public function showAll()
    {
        return view('producttypes', ['producttypes' => ProductType::all()]);
    }
}
