<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        // dd($product);
        if(!$product) {
            abort(404);
            // dd(abort(404));
        }
        $cart = session()->get('cart',[]);
        // dd($product);
        // nếu giỏ hàng trống thì đây là sản phẩm đầu tiên
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];
            // dd($cart);
            session()->put('cart', $cart);
            return redirect()->back();
        }
        // nếu giỏ hàng không trống thì kiểm tra xem sản phẩm này có tồn tại không thì tăng số lượng
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            // dd(session()->get('cart'));
            return redirect()->back();
        }
        // nếu mặt hàng không tồn tại trong giỏ hàng thì thêm vào giỏ hàng với số lượng = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];
        session()->put('cart', $cart);
        return redirect()->back();
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }
}
