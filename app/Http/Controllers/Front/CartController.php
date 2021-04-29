<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $qty = $request->get('qty');
        $product = Product::findOrFail($id);

        $response['cart'] = Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => $qty ?? 1,
            'price' => $product->discount ?? $product->price,
            'weight' => $product->weight ?? 0,
            'options' => [
                'image' => $product->image,
                'restaurant_name' => $product->restaurant->name,
                'restaurant_id' => $product->restaurant->id,
            ],
        ]);

        if ($request->ajax()) {
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }

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

    public function delete(Request $request, $rowId)
    {
        Cart::remove($rowId);

        if ($request->ajax()) {
            $response['rowId_deleted'] = $rowId;

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }

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
