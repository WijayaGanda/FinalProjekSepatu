<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pelanggan</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>

<body>
    <h1>Nota Pelanggan</h1>
    <p><strong>Nomor Resi: </strong>{{ $transaction->no_resi }}</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Merk</th>
                <th>Ukuran</th>
                <th>Jumlah Beli</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td align="center">{{ $transaction->nama_customer }}</td>
                    <td align="center">{{ $transaction->shoe->merk }}</td>
                    <td align="center">{{ $transaction->shoe->ukuran }}</td>
                    <td align="center">{{ $transaction->jumlah_beli }}</td>
                    <td align="center">{{ $transaction->total_harga }}</td>
                </tr>
        </tbody>
    </table>
</body>

</html>