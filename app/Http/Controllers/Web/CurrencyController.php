<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function changeCurrency(Request $request)
    {
        session()->put('currency_code', $request->currency_code);
        $currency = Currency::where('code', $request->currency_code)->first();
        $currency->success = translate('Currency changed to');
        session()->put('currency_symbol', $currency->symbol);
        session()->put('currency_exchange_rate', $currency->exchange_rate);

        return response()->json($currency);
    }
}
