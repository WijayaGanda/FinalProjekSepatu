@extends('layouts.nav')

@section('content')
    <div class="container-sm d-flex justify-content-center my-5">
        <div class="card" style="width: 34rem;">
            <div class="card-body p-3">
                <div class="mb-2 text-center">
                    <i class="bi bi-folder-plus h3"></i>
                    <h4>Create Catalog</h4>
                </div>
                <hr>
                <div class="col mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input class="form-control @error('brand') is-invalid @enderror" type="text" name="brand"
                        id="brand" value="{{ old('brand') }}" placeholder="Insert Brand Name">
                </div>
                <div class="col mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock"
                        id="stock" value="{{ old('stock') }}" placeholder="Insert Stock">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label">Category</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Choose Category
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Man</a></li>
                                <li><a class="dropdown-item" href="#">Woman</a></li>
                                <li><a class="dropdown-item" href="#">Kids</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Choose Supplier
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Nike</a></li>
                                <li><a class="dropdown-item" href="#">Adidas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="formFile" class="form-label"><i class="bi bi-filetype-jpg h5"></i> Image</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="row mt-4 justify-content-center">
                    <div class="col-md-6 d-grid mb-3">
                        <a href="{{ route('home') }}" class="btn btn-outline-danger btn-lg mt-3"><i
                                class="bi bi-x-circle"></i> Cancel</a>
                    </div>

                    <div class="col-md-6 d-grid mb-3">
                        <button type="submit" class="btn btn-outline-success btn-lg mt-3"><i class="bi bi-floppy"></i>
                            Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
