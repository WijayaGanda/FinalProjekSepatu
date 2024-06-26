<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
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
    <h1>Product List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Merk</th>
                <th>Size</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Supplier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shoes as $index => $shoe)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    <td>{{ $shoe->merk }}</td>
                    <td>{{ $shoe->ukuran }}</td>
                    <td>{{ $shoe->stok }}</td>
                    <td align="center">{{ $shoe->category->nama }}</td>
                    <td>{{ $shoe->supplier->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
