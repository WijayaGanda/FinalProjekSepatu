@extends('layouts.app')
@section('content')
    
<body style="background-color: rgb(237, 237, 237)">
    
<div class="container-sm my-5">
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xl-4 border">
            <div class="mb-3 text-center">
                <h3 style="font-weight: bold;">Detail Sepatu</h3>
            </div>
            <hr style="height: 5px; background-color: black; border: none;">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="pict" class="form-label">Picture</label>   
                    <h5></h5>
                    <hr>
                </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="merk" class="form-label">Merk Sepatu</label>   
                    <h5></h5>
                    <hr>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="uk" class="form-label">Ukuran Sepatu</label>
                    <h5></h5>
                    <hr>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="stok" class="form-label">Stok Sepatu</label>
                    <h5></h5>
                    <hr>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <h5></h5>
                    <hr>
                    {{-- @if ()
                        <h5></h5>
                        <a href="{{ route(' ', ['employeeId' => $employee->id]) }}"
                            class="btn btn-primary btn-sm mt-2">
                            <i class="bi bi-download me-1"></i> Download CV
                        </a>
                    @else
                        <h5>Tidak ada</h5>
                    @endif --}}
                </div>
                <div class="col-md-12 mb-3">
                    <label for="supp" class="form-label">Supplier</label>
                    <h5></h5>
                    <hr>
                </div>
            </div>
            <hr style="height: 5px; background-color: black; border: none;">
            <div class="row">
                <div class="col-md-12 d-grid">
                    <a href="" class="btn btn-outline-light btn-lg mt-3" style="background-color: black"><i
                            class="bi-arrow-left-circle me-2"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
