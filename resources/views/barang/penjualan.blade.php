@extends('layouts.app')
@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-4 border">
                    <div class="mb-3 text-center">
                        <h3 style="font-weight: bold;">Penjualan Sepatu</h3>
                    </div>
                    <hr style="height: 5px; background-color: black; border: none;">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nama" class="form-label">Nama Pembeli: </label>
                            <h5>
                                <input class="form-control @error('nama_pembeli') is-invalid @enderror" type="text"
                                    name="nama_pembeli" id="brand" value="{{ old('nama') }}"
                                    placeholder="Insert Customer Name">
                                @error('nama_pembeli')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="merk" class="form-label">Merk Sepatu</label>
                                <div class="dropdown">
                                    <select class="form-select" name="shoes_id" id="merk">
                                        @foreach ($shoes as $shoe)
                                            <option value="{{ $shoe->id }}" data-ukuran="{{ $shoe->ukuran }}"
                                                data-harga="{{ $shoe->harga }}"
                                                {{ old('shoe') == $shoe->id ? 'selected' : '' }}>
                                                {{ $shoe->merk . ' - ' . $shoe->ukuran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="ukuran" class="form-label">Ukuran Sepatu: </label>
                                <input class="form-control" type="text" id="ukuran" disabled>
                                <hr>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="stok" class="form-label">Harga Sepatu: </label>
                                <input class="form-control" type="text" id="harga" disabled>
                                <hr>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="uk" class="form-label">Jumlah Beli: </label>
                                <input class="form-control @error('jumlah') is-invalid @enderror" type="number"
                                    name="jumlah" id="jumlah" value="{{ old('jumlah') }}" placeholder="Insert amount">
                                @error('jumlah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <hr>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="uk" class="form-label">Total Harga: </label>
                                <input class="form-control @error('total') is-invalid @enderror" type="text"
                                    name="total_harga" id="total_harga" value="{{ old('jumlah') }}" placeholder="Total"
                                    >
                                @error('jumlah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <hr>
                            </div>
                        </div>
                        <hr style="height: 5px; background-color: black; border: none;">
                        <div class="row">
                            <div class="col-md-6 d-grid mb-3">
                                <a href="{{ route('barangs.index') }}" class="btn btn-outline-light btn-lg mt-3"
                                    style="background-color: black"><i class="bi-arrow-left-circle me-2"></i> Back</a>
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