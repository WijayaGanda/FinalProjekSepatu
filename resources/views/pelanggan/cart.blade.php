@extends('customerlayouts.appcustomer')

@section('content')
    <div class="container mt-4">
        <h4>Keranjang Belanja</h4>
        @if (session('cart') && count(session('cart')) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('cart') as $id => $item)
                        <tr>
                            <td>{{ $item['merk'] }}</td>
                            <td>{{ number_format($item['harga'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                        class="form-control">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                                </form>
                            </td>
                            <td>{{ number_format($item['harga'] * $item['quantity'], 0, ',', '.') }}</td>
                            <td>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                <!-- Tombol Beli -->
                                <form action="{{ route('customersales.create') }}" method="GET" style="display:inline;">
                                    <input type="hidden" name="shoe_id" value="{{ $item['id'] }}">
                                    <input type="hidden" name="quantity" value="{{ $item['quantity'] }}">
                                    <button type="button" class="btn btn-success btn-sm buy-button">Beli</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Keranjang Anda kosong.</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buyButtons = document.querySelectorAll('.buy-button');

            buyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');
                    const shoeId = form.querySelector('input[name="shoe_id"]').value;

                    // Kirim permintaan untuk menghapus item yang dibeli dari keranjang
                    fetch(`/cart/clear/${shoeId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data.message);

                            // Setelah penghapusan produk, form akan disubmit
                            form.submit();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>
@endsection
