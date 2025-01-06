<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use PDF;

class CustomerSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Daftar Penjualan';
        $transactions =  Transaction::with('shoe')->where('user_id', auth()->id())  // Filter berdasarkan user_id
            ->get();
        return view('pelanggan.history', compact('pageTitle', 'transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pageTitle = 'Tambah Penjualan';
        $shoeId = $request->get('shoe_id'); // Mengambil shoe_id dari query parameter
        $quantity = $request->get('quantity', 1); // Mengambil quantity dari query parameter, default 1

        $shoes = Shoe::find($shoeId); // Menemukan sepatu berdasarkan ID

        if (!$shoes) {
            Alert::error('Failed', 'Shoe Not Found');
            return redirect()->route('home');
        }

        $userName = auth()->user()->name;

        return view('pelanggan.penjualanpelanggan', compact('pageTitle', 'shoes', 'userName', 'quantity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
            'exists' => ':Attribute tidak valid',
        ];

        $validator = Validator::make($request->all(), [
            'shoes_id' => 'required',
            'jumlah' => 'required|numeric',
            'nama_pembeli' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menemukan sepatu berdasarkan ID
        $shoes = Shoe::find($request->shoes_id);

        // Mengecek apakah stok cukup
        if ($shoes->stok < $request->jumlah) {
            Alert::error('Failed', 'Stok Sepatu Tidak Cukup');
            return redirect()->route('customersales.index');
        }

        // Menghitung total harga
        $totalHarga = $shoes->harga * $request->jumlah;

        // Membuat transaksi baru
        $transaction = new Transaction();


        // Jika pengguna login, set user_id
        if (auth()->check()) {
            $transaction->user_id = auth()->id();
        }
        $transaction->nama_customer = $request->nama_pembeli;
        $transaction->shoe_id = $request->shoes_id;
        $transaction->jumlah_beli = $request->jumlah;
        $transaction->total_harga = $totalHarga;
        $transaction->no_resi = strtoupper(Str::random(10));
        $transaction->save();

        // Update stok sepatu
        $shoes->stok -= $request->jumlah; // Mengurangi stok
        $shoes->save();
        

        // Menampilkan pesan sukses
        Alert::success('Berhasil', 'Sepatu Terjual');

        return redirect()->route('customersales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);

        // Hapus transaksi
        $transaction->delete();

        return redirect()->route('customersales.index')->with('success', 'Data berhasil dihapus!');
    }
    public function exportNota($id)
    {
        $transaction = Transaction::findorFail($id);

        $pdf = PDF::loadView('pelanggan.notapelanggan', compact('transaction'))
            ->setPaper('letter');

        return $pdf->download($transaction->nama_customer . '.pdf');
    }
}
