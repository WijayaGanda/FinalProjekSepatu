<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Shoe;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    public function index()
    {
        $pageTitle = 'Daftar Penjualan';
        $transactions =  Transaction::with('shoe')->get();
        return view('penjualan.listpenjualan', compact('pageTitle', 'transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Penjualan';
        $shoes = Shoe::all();
        return view('barang.penjualan', compact('pageTitle', 'shoes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
            'exists' => ':Attribute tidak valid'
        ];

        $validator = Validator::make($request->all(), [
            'shoes_id' => 'required',
            'jumlah' => 'required|numeric',
            'nama_pembeli' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $shoes = Shoe::find($request->shoes_id);

        if ($shoes->stok < $request->jumlah) {
            return redirect()->back()->withErrors(['stok' => 'Stok tidak mencukupi'])->withInput();
        }

        $transaction = new Transaction();
        $transaction->nama_customer = $request->nama_pembeli;
        $transaction->shoe_id = $request->shoes_id;
        $transaction->jumlah_beli = $request->jumlah;
        $transaction->total_harga = $request->total_harga;
        $transaction->save();
        // Update shoe stock
        $shoes->stok -= $request->jumlah;
        $shoes->save();

        Alert::success('Sold Successfully', 'Shoes Sold Successfully');

        return redirect()->route('sales.index');
    }
    public function exportNota($id)
    {
        $transaction = Transaction::findorFail($id);

        $pdf = PDF::loadView('penjualan.nota', compact('transaction'))
            ->setPaper('letter');

        return $pdf->download($transaction->nama_customer . '.pdf');
    }
}
