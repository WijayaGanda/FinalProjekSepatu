@extends('customerlayouts.appcustomer')
@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable">
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Merk</th>
                        <th>Ukuran</th>
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
                            <td>{{ $trans->shoe->ukuran }}</td>
                            <td>{{ $trans->jumlah_beli }}</td>
                            <td>{{ number_format($trans->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('customersales.exportNota', ['id' => $trans->id]) }}"
                                    class="btn btn-outline-dark btn-sm me-2">Cetak Nota</a>
                                <form action="{{ route('customersales.destroy', ['id' => $trans->id]) }}" method="POST"
                                    style="display: inline;" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.querySelectorAll('.btn-delete').forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault(); // Mencegah aksi submit langsung
                        const form = this.closest('.form-delete');

                        Swal.fire({
                            title: 'Yakin ingin menghapus?',
                            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            </script>
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
            @endif
        </div>
    </div>
@endsection
