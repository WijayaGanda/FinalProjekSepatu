@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-6">
                {{-- <ul class="list-inline mb-0 float-end">
                    <li class="list-inline-item">
                        <a href="{{route('barangs.exportExcel')}}" class="btn btn-outline-success">
                            <i class="bi bi-download me-1"></i> to Excel
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{route('barangs.exportPdf')}}" class="btn btn-outline-danger">
                            <i class="bi bi-download me-1"></i> to PDF
                        </a>
                    </li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">
                        <a href="{{ route('barangs.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Create Shoes
                        </a>
                    </li> --}}
                    <li class="list-inline-item">
                        <a href="{{ route('sales.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Penjualan Sepatu
                        </a>
                    </li>
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createEmployee">
                        <i class="bi bi-plus-circle me-1"></i>Create Employee
                    </button> --}}
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
                            <td><a href="{{ route('sales.exportNota', ['id' => $trans->id]) }}" class="btn btn-outline-dark btn-sm me-2">Cetak Nota</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection