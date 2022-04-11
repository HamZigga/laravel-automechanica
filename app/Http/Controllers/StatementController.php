<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatementRequest;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Statement;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function create()
    {
        return view('statement');
    }

    public function store(StatementRequest $request)
    {
        $purchases = Purchase::where('user_id', auth()->user()->id)->where('is_active', 1)->where('is_ready', 0)->orderBy('updated_at')->get();
        $sum = 0;
        foreach($purchases as $purchase){
            $sum +=$purchase->product->price*$purchase->quantity;
        }
        Statement::create([
            'user_id' => auth()->user()->id,
            'summ' => $sum,
            'phone' => $request->phone,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => auth()->user()->email,
        ])->purchase()->sync($purchases);

        Purchase::where('user_id', auth()->user()->id)->where('is_active', 1)->where('is_ready', 0)->update([
            'is_active' => 0,
            'is_ready' => 1,
        ]);
        return redirect()->route('main')->with('success', 'Заявка успешно отправлена');
    }
}
