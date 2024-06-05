<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SepatuExport;
use PDF;
use App\Models\Shoe;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;
use RealRashid\SweetAlert\Facades\Alert;

class SepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Daftar Sepatu';
        confirmDelete();
        $shoes = Shoe::all();
        return view('barang.index', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Sepatu';

        // ELOQUENT
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('barang.create', compact('pageTitle', 'categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'merk' => 'required',
            'size' => 'required|numeric',
            'stock' => 'required|numeric',
            'harga' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file = $request->file('img');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();

            // menampilkan File
            $file->store('public/files');
        }
        // ELOQUENT
        $shoe = new Shoe();
        $shoe->merk = $request->merk;
        $shoe->ukuran = $request->size;
        $shoe->stok = $request->stock;
        $shoe->harga = $request->harga;
        $shoe->category_id = $request->category;
        $shoe->supplier_id = $request->supplier;
        if ($file != null) {
            $shoe->original_filename = $originalFilename;
            $shoe->encrypted_filename = $encryptedFilename;
        }

        $shoe->save();
        Alert::success('Added Successfully', 'Shoes Data Added Successfully');

        return redirect()->route('barangs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Shoes Detail';

        // ELOQUENT
        $shoe = Shoe::find($id);

        return view('barang.show', compact('pageTitle', 'shoe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Sepatu';

        // ELOQUENT
        $categories = Category::all();
        $suppliers = Supplier::all();
        $shoe = Shoe::find($id);

        return view('barang.edit', compact('pageTitle', 'shoe', 'suppliers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'merk' => 'required',
            'size' => 'required|numeric',
            'stock' => 'required|numeric',
            'harga' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $shoe = Shoe::find($id);
        $shoe->merk = $request->merk;
        $shoe->ukuran = $request->size;
        $shoe->stok = $request->stock;
        $shoe->harga = $request->harga;
        $shoe->category_id = $request->category;
        $shoe->supplier_id = $request->supplier;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');

            // menghapus cv lama jika tersedia
            if ($shoe->encrypted_filename) {
                Storage::delete('public/files/' . $shoe->encrypted_filename);
            }

            $shoe->original_filename = $originalFilename;
            $shoe->encrypted_filename = $encryptedFilename;
        }

        $shoe->save();
        Alert::success('Updated Successfully', 'Shoes Data Updated Successfully');

        return redirect()->route('barangs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $shoe = Shoe::find($id);

        //menghapus cv
        if ($shoe->encrypted_filename) {
            Storage::delete('public/files/' . $shoe->encrypted_filename);
        }
        $shoe->delete();
        Alert::success('Deleted Successfully', 'Shoes Data Deleted');
        return redirect()->route('barangs.index');
    }

    public function getData(Request $request)
    {
        $shoes = Shoe::with('category', 'supplier');

        if ($request->ajax()) {
            return datatables()->of($shoes)
                ->addIndexColumn()
                ->addColumn('action', function ($shoe) {
                    return view('barang.action', compact('shoe'));
                })
                ->toJson();
        }
    }

    public function exportExcel()
    {
        return Excel::download(new SepatuExport, 'sepatu.xlsx');
    }
    public function exportPdf()
    {
        $shoes = Shoe::all();

        $pdf = PDF::loadView('barang.export_pdf', compact('shoes'));

        return $pdf->download('barangs.pdf');
    }
}
