<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsManager extends Controller
{
    function home()
    {
        $products = Products::paginate(8);
        return view("home", compact("products"));
    }

    function search(Request $request)
    {
        $search = $request->input('search');
    
        $products = Products::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->paginate(12);
        
        return view('home', compact('products'));
    }

    function details($slug)
    {
        $product = Products::where("slug", $slug)->first();
        return view("details", compact("product"));
    }

    function addToCart($id)
    {
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        if ($cart->save()) {
            return redirect()->back()->with("success", "Product added to cart");
        }
        return redirect()->back()->with("error", "Something went wrong");
    }

    function showCart()
    {
        $cartItems = DB::table("cart")
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->select("cart.product_id", DB::raw("count(*) as quantity"), "products.title", "products.price", "products.image", "products.slug")
            ->where("cart.user_id", Auth::user()->id)
            ->groupBy("cart.product_id", "products.title", "products.price", "products.image", "products.slug")
            ->paginate(5);
        return view("cart", compact("cartItems"));
    }

    public function removeCart($id)
    {
        $cartItem = DB::table("cart")->where("user_id", Auth::user()->id)->where("product_id", $id)->first();
        if ($cartItem) {
            DB::table("cart")->where("id", $cartItem->id)->delete();
            return redirect()->route("cart.show")->with("success", "Item removed successfully!");
        }
        return redirect()->route("cart.show")->with("error", "Item not found in cart");
    }
}
