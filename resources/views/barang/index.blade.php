@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-6">
                <ul class="list-inline mb-0 float-end">
                    <li class="list-inline-item">
                        <a href="{{ route('barangs.exportExcel') }}" class="btn btn-outline-success">
                            <i class="bi bi-download me-1"></i> to Excel
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('barangs.exportPdf') }}" class="btn btn-outline-danger">
                            <i class="bi bi-download me-1"></i> to PDF
                        </a>
                    </li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">
                        <a href="{{ route('barangs.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Create Shoes
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('sales.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Penjualan
                        </a>

                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="shoesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NO</th>
                        <th width="1%">Gambar</th>
                        <th>Merk</th>
                        <th>Ukuran</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <br>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            try {
                $("#shoesTable").DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "/getShoes",
                        type: "GET",
                        dataSrc: function(json) {
                            // Memastikan format data yang diterima sesuai dengan yang diharapkan oleh DataTables
                            return json.data || [];
                        },
                        error: function(xhr, error, thrown) {
                            // Menangani error Ajax tanpa menampilkan alert
                            console.log("Ajax error:",
                            error); // Hanya log error ke konsol untuk debugging
                        }
                    },
                    bDestroy: true,
                    columns: [{
                            data: "id",
                            name: "id",
                            visible: false
                        },
                        {
                            data: "DT_RowIndex",
                            name: "DT_RowIndex",
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: "encrypted_filename",
                            name: "img",
                            render: function(data, full) {
                                const originalFilename = full.original_filename;
                                const imageUrl = `/storage/files/${data}`;
                                return `<img src="${imageUrl}" alt="${originalFilename}" title="${originalFilename}" width="150px"/>`;
                            },
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: "merk",
                            name: "merk"
                        },
                        {
                            data: "ukuran",
                            name: "ukuran"
                        },
                        {
                            data: "stok",
                            name: "stok"
                        },
                        {
                            data: "harga",
                            name: "harga"
                        },
                        {
                            data: "category.nama",
                            name: "category.nama"
                        },
                        {
                            data: "supplier.nama",
                            name: "supplier.nama"
                        },
                        {
                            data: "action",
                            name: "action",
                            orderable: false,
                            searchable: false
                        },
                    ],
                    order: [
                        [0, "asc"]
                    ],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"],
                    ],
                });
            } catch (e) {
                console.log("Error initializing DataTable:", e);
            }
            $(".datatable").on("click", ".btn-delete", function(e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
