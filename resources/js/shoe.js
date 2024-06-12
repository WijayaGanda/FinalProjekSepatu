$(function(){
        $("#shoesTable").DataTable({
            serverSide: true,
            processing: true,
            ajax: "/getShoes",
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
