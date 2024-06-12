@extends('layouts.app')
@section('content')

    <body style="background:linear-gradient(to bottom, #6D5380, #000000)">
        <div class="container-sm my-5" style="max-width: 105rem; height: 42rem">
            <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="p-5 bg-light rounded-3 col-xl-4 border">
                        <div class="mb-3 text-center">
                            <i class="bi bi-cart-check-fill h3"></i>
                            <h4>Penjualan Sepatu</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label" style="font-weight: bold">Nama Pembeli: </label>
                                <h5>
                                    <input class="form-control @error('nama_pembeli') is-invalid @enderror" type="text"
                                        name="nama_pembeli" id="brand" value="{{ old('nama_pembeli') }}"
                                        placeholder="Insert Customer Name">
                                    @error('nama_pembeli')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="merk" class="form-label" style="font-weight: bold">Merk Sepatu</label>
                                <div class="dropdown">
                                    <select class="form-select" name="shoes_id" id="merk">
                                        @foreach ($shoes as $shoe)
                                            <option value="{{ $shoe->id }}" data-ukuran="{{ $shoe->ukuran }}"
                                                data-harga="{{ $shoe->harga }}"
                                                {{ old('shoes_id') == $shoe->id ? 'selected' : '' }}>
                                                {{ $shoe->merk . ' - ' . $shoe->ukuran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ukuran" class="form-label" style="font-weight: bold">Ukuran Sepatu: </label>
                                <input class="form-control" type="text" id="ukuran" disabled placeholder="Ukuran Sepatu">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="stok" class="form-label" style="font-weight: bold">Harga Sepatu: </label>
                                <input class="form-control" type="text" id="harga" disabled placeholder="Harga Sepatu">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="harga" class="form-label" style="font-weight: bold">Jumlah Beli: </label>
                                <input class="form-control @error('jumlah') is-invalid @enderror" type="number"
                                    name="jumlah" id="jumlah" value="{{ old('jumlah') }}" placeholder="Insert amount" min="0">
                                @error('jumlah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="uk" class="form-label" style="font-weight: bold">Total Harga: </label>
                                <input class="form-control @error('total') is-invalid @enderror" type="text"
                                    name="total_harga" id="total_harga" value="{{ old('jumlah') }}" placeholder="Total" readonly>
                                @error('jumlah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 d-grid mb-3">
                                <a href="{{ route('barangs.index') }}" class="btn btn-outline-dark btn-lg mt-3"
                                style="background-color: black)"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                            </div>
                            <div class="col-md-6 d-grid mb-3">
                                <button type="submit" class="btn btn-outline-success btn-lg mt-3"><i
                                        class="bi bi-floppy"></i>
                                    Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const shoeSelect = document.getElementById('merk');
            const ukuranInput = document.getElementById('ukuran');
            const hargaInput = document.getElementById('harga');
            const jumlahInput = document.getElementById('jumlah');
            const totalHargaInput = document.getElementById('total_harga');

            function updateTotalHarga() {
                const harga = parseInt(hargaInput.value);
                const jumlah = parseInt(jumlahInput.value);
                const totalHarga = harga * jumlah;
                totalHargaInput.value = totalHarga.toFixed(0);
            }

            shoeSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const ukuran = selectedOption.getAttribute('data-ukuran');
                const harga = selectedOption.getAttribute('data-harga');

                ukuranInput.value = ukuran;
                hargaInput.value = harga;

                updateTotalHarga();
            });
            jumlahInput.addEventListener('input', updateTotalHarga);
        });
    </script>
@endsection
