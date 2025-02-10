<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class OrderManager extends Controller
{
    public function showCheckout(): View
    {
        return view("checkout");
    }

    public function checkoutPost(Request $request): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                'address' => 'required|string|max:255',
                'region' => 'required|string|max:255',
                'phone' => 'required|string|min:10|max:15',
            ]);

            $cartItems = DB::table("cart")
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->select("cart.product_id", DB::raw("count(*) as quantity"), "products.price")
                ->where("cart.user_id", Auth::id())
                ->groupBy("cart.product_id", "products.price")
                ->get();
            
            if($cartItems->isEmpty()) {
                return redirect()->route('cart.show')
                    ->with('error', 'Your cart is empty');
            }

            $productIds = [];
            $quantities = [];
            $totalPrice = 0;

            foreach($cartItems as $cartItem) {
                $productIds[] = $cartItem->product_id;
                $quantities[] = $cartItem->quantity;
                $totalPrice += $cartItem->price * $cartItem->quantity;
            }

            DB::beginTransaction();
            try {
                Orders::create([
                    'user_id' => Auth::id(),
                    'address' => $validatedData['address'],
                    'region' => $validatedData['region'],
                    'phone' => $validatedData['phone'],
                    'product_id' => $productIds,
                    'total_price' => $totalPrice,
                    'quantity' => $quantities,
                ]);

                DB::table('cart')
                    ->where('user_id', Auth::id())
                    ->delete();

                DB::commit();
                
                return redirect()->route('cart.show')
                    ->with('success', 'Order placed successfully');
                    
            } catch (Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (Exception $e) {
            return redirect()->route('cart.show')
                ->with('error', 'Failed to place order. Please try again.');
        }
    }
}
