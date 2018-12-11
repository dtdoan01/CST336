<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Game;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::make();

        return view('cart', compact('cart'));
    }

    public function add(Game $game)
    {
        Cart::make()
            ->add($game)
            ->save();

        return redirect()->route('cart');
    }

    public function promo(Request $request)
    {
        $codes = collect([
            ['code' => 'PERCENT20', 'type' => 'percent', 'amount' => 20],
            ['code' => 'MONEY18', 'type' => 'fixed', 'amount' => 18],
        ]);

        $promo = $request->get('code');
        $code = $codes->where('code', $promo)->first();
        Cart::make()->setDiscount($code);

        return redirect()->back();
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function confirm()
    {
        Cart::checkout();

        return view('confirm');
    }

    public function remove(Game $game)
    {
        Cart::make()
            ->remove($game)
            ->save();

        return redirect()->back();
    }
}
