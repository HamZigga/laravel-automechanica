<?php

namespace App\Http\Controllers;


use App\Models\CarModel;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        return view('product', ['product' => Product::findOrfail($id)]);
    }

    public function search(){
        return view('search', ['producttypes' => ProductType::all(), 'carmodels' => CarModel::all()]);
    }

    public function searchResult(Request $request){
        if(!empty($request->searchInput)){
            $result = Product::where([
                ['producttype_id', $request->producttype],
                ['title', 'LIKE', $request->searchInput]
            ])->whereHas('carmodel', function($query) use ($request){
                $query->where('id', $request->carmodel);
            })->get();
        } else {
            $result = Product::where('producttype_id', $request->producttype)->whereHas('carmodel', function($query) use ($request){
                $query->where('id', $request->carmodel);
            })->get();
        }
        
        return view('search', ['products'=> $result, 'producttypes' => ProductType::all(), 'carmodels' => CarModel::all()]);
    }
}
