<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Merk</th>
            <th>Ukuran</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Supplier</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shoes as $index => $shoe)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $shoe->merk }}</td>
                <td>{{ $shoe->ukuran }}</td>
                <td>{{ $shoe->stok }}</td>
                <td>{{ $shoe->category->nama }}</td>
                <td>{{ $shoe->supplier->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
