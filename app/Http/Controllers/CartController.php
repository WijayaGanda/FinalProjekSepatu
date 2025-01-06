<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('pelanggan.cart', compact('cart'));
    }

    public function add(Request $request, $shoe_id)
    {
        $shoe = Shoe::findOrFail($shoe_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$shoe_id])) {
            $cart[$shoe_id]['quantity']++;
        } else {
            $cart[$shoe_id] = [
                'id' => $shoe->id,
                'merk' => $shoe->merk,
                'harga' => $shoe->harga,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function clearCart($shoe_id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$shoe_id])) {
            unset($cart[$shoe_id]); // Hapus hanya produk tertentu
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Produk telah dibeli dan dihapus dari keranjang']);
    }
}
