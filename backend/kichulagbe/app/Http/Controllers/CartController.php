<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Method to handle adding product to cart
    public function add($id)
    {
        // Get product from the database
        $product = Product::find($id);

        // Check if product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        // Add product to session or cart (simplified example)
        $cart = session()->get('cart', []);

        // If the product is already in cart, increase quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
