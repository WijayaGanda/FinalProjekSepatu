<?php

namespace App\Http\Controllers;


use App\Charts\SepatuChart;
use App\Models\Shoe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $pageTitle = 'Home';

        // Filter shoes based on search input
        $query = Shoe::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('merk', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('nama', 'like', '%' . $search . '%');
                  })
                  ->orWhereHas('supplier', function ($q) use ($search) {
                      $q->where('nama', 'like', '%' . $search . '%');
                  });
        }

        // Fetch shoes with related data (eager loading)
        $shoes = $query->with('category', 'supplier')->get();

        return view('pelanggan.homecustomer', [
            'pageTitle' => $pageTitle,
            'shoes' => $shoes,
            'search' => $request->input('search'),
        ]);
    }
}
