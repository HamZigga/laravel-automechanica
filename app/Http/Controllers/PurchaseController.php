<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store(PurchaseRequest $request)
    {   
        Purchase::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'is_active' => 1,
            'is_ready' => 0,
        ]);
        return back()->with('success', 'Предмет добавлен в корзину');
    }

    public function show()
    {
        return view('cart', ['purchases' => Purchase::where('user_id', auth()->user()->id)->where('is_active', 1)->where('is_ready', 0)->orderBy('updated_at')->get()]);
    }

    public function disable($id)
    {
        Purchase::findOrFail($id)->delete();
        return redirect()->route('cart')->with('success', 'Элемент успешно удален');
    }
}
