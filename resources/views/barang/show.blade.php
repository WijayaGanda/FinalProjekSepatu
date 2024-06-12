@extends('layouts.app')
@section('content')

    <body style="background:linear-gradient(to bottom, #6D5380, #000000)">
        <div class="container-sm my-5" style="max-width: 100rem;">
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-4 border">
                    <div class="mb-3 text-center">
                        <i class="bi bi-card-list h3"></i><br>
                        <h4>Shoes Detail</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <label for="pict" class="form-label" style="font-weight: bold">Picture</label>
                        <div class="text-center">
                            <h5>
                                @if ($shoe->encrypted_filename)
                                    <img src="{{ asset('storage/files/' . $shoe->encrypted_filename) }}"
                                        alt="{{ $shoe->original_filename }}" width="250px">
                                @else
                                    No image available
                                @endif
                            </h5>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="merk" class="form-label" style="font-weight: bold">Merk Sepatu</label>
                            <h5>{{ $shoe->merk }}</h5>
                            <hr>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="uk" class="form-label" style="font-weight: bold">Ukuran Sepatu</label>
                            <h5>{{ $shoe->ukuran }}</h5>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label" style="font-weight: bold">Stok Sepatu</label>
                            <h5>{{ $shoe->stok }}</h5>
                            <hr>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label" style="font-weight: bold">Harga Sepatu</label>
                            <h5>{{ $shoe->harga }}</h5>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kategori" class="form-label" style="font-weight: bold">Kategori</label>
                            <h5>{{ $shoe->category->nama }}</h5>
                            <hr>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="supp" class="form-label" style="font-weight: bold">Supplier</label>
                            <h5>{{ $shoe->supplier->nama }}</h5>
                            <hr>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 d-grid">
                            <a href="{{ route('barangs.index') }}" class="btn btn-outline-dark btn-lg mt-3"
                                style="background-color: black)"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
