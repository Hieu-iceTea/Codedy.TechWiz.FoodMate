<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);

        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->discount ?? $product->price,
            'weight' => $product->weight ?? 0,
            'options' => [
                'image' => $product->image,
                'restaurant_name' => $product->restaurant->name,
                'restaurant_id' => $product->restaurant->id,
            ],
        ]);

        return redirect('cart');
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        $carts = Cart::content()->groupBy('options.restaurant_id');

        return view('front.cart', compact('carts', 'total', 'subtotal'));
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        return back();
    }

    public function destroy(Request $request)
    {
        if (count($request->rowIds) > 0) {
            foreach ($request->rowIds as $rowId) {
                Cart::remove($rowId);
            }
        } else {
            Cart::destroy();
        }

        return back();
    }

    public function update($rowId, Request $request)
    {
        Cart::update($request->rowId, $request->qty);

        return redirect()->back();
    }
}
