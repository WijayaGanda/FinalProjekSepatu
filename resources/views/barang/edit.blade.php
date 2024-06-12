@extends('layouts.app')

@section('content')
    <form action="{{ route('barangs.update', ['barang' => $shoe->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <body style="background:linear-gradient(to top, #000000, #6D5380);">
            <div class="container-sm d-flex justify-content-center my-5">
                <div class="card" style="width: 34rem;">
                    <div class="card-body p-3">
                        <div class="mb-2 text-center">
                            <i class="bi bi-folder-plus h3"></i>
                            <h4>Edit Shoes</h4>
                        </div>
                        <hr>
                        <div class="col mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input class="form-control @error('merk') is-invalid @enderror" type="text" name="merk"
                                id="brand" value="{{ $shoe->merk }}" placeholder="Insert Brand Name">
                            @error('merk')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="size" class="form-label">Size</label>
                            <input class="form-control @error('size') is-invalid @enderror" type="text" name="size"
                                id="size" value="{{ $shoe->ukuran }}" placeholder="Insert Stock">
                            @error('size')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock"
                                id="stock" value="{{ $shoe->stok }}" placeholder="Insert Stock">
                            @error('stock')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="prize" class="form-label">Prize</label>
                            <input class="form-control @error('harga') is-invalid @enderror" type="text" name="harga"
                                id="harga" value="{{ $shoe->harga }}" placeholder="Insert prize">
                            @error('harga')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Category</label>
                                <div class="dropdown">
                                    <select class="form-select" name="category">
                                        @php
                                            $selected = '';
                                            if ($errors->any()) {
                                                $selected = old('category');
                                            } else {
                                                $selected = $shoe->category_id;
                                            }
                                        @endphp
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $selected == $category->id ? 'selected' : '' }}>
                                                {{ $category->kode . '-' . $category->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="supplier" class="form-label">Supplier</label>
                                <div class="dropdown">
                                    <select class="form-select" name="supplier">
                                        @php
                                            $selected = '';
                                            if ($errors->any()) {
                                                $selected = old('supplier');
                                            } else {
                                                $selected = $shoe->supplier_id;
                                            }
                                        @endphp
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                {{ $selected == $supplier->id ? 'selected' : '' }}>
                                                {{ $supplier->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="formFile" class="form-label"> Image</label>
                            @if ($shoe->original_filename)
                                <p style="font-weight: bold">Gambar lama: {{ $shoe->original_filename }}</p>
                                {{-- <a href="{{ route('employees.downloadFile', ['employeeId' => $employee->id]) }}"
                                    class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-download me-1"></i> Download CV
                                </a> --}}
                            @else
                                <p style="font-weight: bold">Tidak Ada</p>
                            @endif
                            @if ($shoe->encrypted_filename)
                                <img src="{{ asset('storage/files/' . $shoe->encrypted_filename) }}"
                                    alt="{{ $shoe->original_filename }}" width="150px">
                            @else
                                Tampilan Gambar tidak ada
                            @endif
                            <input class="form-control" type="file" id="formFile" name="img">
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-md-6 d-grid mb-3">
                                <a href="{{ route('barangs.index') }}" class="btn btn-outline-danger btn-lg mt-3"><i
                                        class="bi bi-x-circle"></i> Cancel</a>
                            </div>

                            <div class="col-md-6 d-grid mb-3">
                                <button type="submit" class="btn btn-outline-success btn-lg mt-3"><i
                                        class="bi bi-floppy"></i>
                                    Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </form>
@endsection
