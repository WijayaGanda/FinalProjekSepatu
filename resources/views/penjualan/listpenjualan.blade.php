@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-6">
                    <li class="list-inline-item">
                        <a href="{{ route('sales.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Penjualan Sepatu
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable">
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Merk</th>
                        <th>Jumlah Beli</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $trans)
                        <tr>
                            <td>{{ $trans->nama_customer }}</td>
                            <td>{{ $trans->shoe->merk }}</td>
                            <td>{{ $trans->jumlah_beli }}</td>
                            <td>{{ $trans->total_harga }}</td>
                            <td><a href="{{ route('sales.exportNotaPenjualan', ['id' => $trans->id]) }}" class="btn btn-outline-dark btn-sm me-2">Cetak Nota</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection