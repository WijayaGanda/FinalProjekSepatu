@extends('customerlayouts.appcustomer')
@section('content')

    <body style="background:linear-gradient(to bottom, #6D5380, #000000)">
        <div class="container-sm my-5" style="max-width: 105rem; height: 42rem">
            <form action="{{ route('customersales.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="p-5 bg-light rounded-3 col-xl-4 border">
                        <div class="mb-3 text-center">
                            <i class="bi bi-cart-check-fill h3"></i>
                            <h4>Penjualan Sepatu</h4>
                        </div>
                        <hr>
                        <input type="hidden" name="shoes_id" value="{{ $shoes->id }}">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label" style="font-weight: bold">Nama Penghutang: </label>
                                <h5>
                                    <input class="form-control @error('nama_pembeli') is-invalid @enderror" type="text"
                                        name="nama_pembeli" id="nama" value="{{ $userName }}"
                                        placeholder="Insert Customer Name" readonly>
                                    @error('nama_pembeli')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="merk" class="form-label" style="font-weight: bold">Merk Sepatu</label>
                                <input class="form-control" type="text" id="merk" value="{{ $shoes->merk }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="stok" class="form-label" style="font-weight: bold">Stok: </label>
                                <input class="form-control" type="text" id="stok" value="{{ $shoes->stok }}"
                                    disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ukuran" class="form-label" style="font-weight: bold">Ukuran Sepatu: </label>
                                <input class="form-control" type="text" id="ukuran" value="{{ $shoes->ukuran }}"
                                    disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="harga" class="form-label" style="font-weight: bold">Harga Sepatu: </label>
                                <input class="form-control" type="text" id="harga" value="{{ $shoes->harga }}"
                                    disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jumlah" class="form-label" style="font-weight: bold">Jumlah Beli: </label>
                                <input class="form-control @error('jumlah') is-invalid @enderror" type="number"
                                    name="jumlah" id="jumlah" value="{{ old('jumlah', $quantity) }}"
                                    placeholder="Insert amount" min="1">
                                @error('jumlah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="total_harga" class="form-label" style="font-weight: bold">Total Harga: </label>
                                <input class="form-control @error('total') is-invalid @enderror" type="text"
                                    name="total_harga" id="total_harga" value="{{ old('total_harga') }}"
                                    placeholder="Total" readonly>
                                @error('jumlah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 d-grid mb-3">
                                <a href="{{ route('pelanggan.homecustomer') }}" class="btn btn-outline-dark btn-lg mt-3"
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
            const jumlahInput = document.getElementById('jumlah');
            const hargaInput = document.getElementById('harga');
            const totalHargaInput = document.getElementById('total_harga');

            // Fungsi untuk menghitung total harga
            function updateTotalHarga() {
                const harga = parseInt(hargaInput.value) || 0;
                const jumlah = parseInt(jumlahInput.value) || 0;
                const totalHarga = harga * jumlah;
                totalHargaInput.value = totalHarga.toLocaleString(); // Format angka
            }

            // Perbarui total harga saat jumlah berubah
            jumlahInput.addEventListener('input', updateTotalHarga);

            // Inisialisasi total harga saat halaman dimuat
            updateTotalHarga();
        });
    </script>
@endsection
