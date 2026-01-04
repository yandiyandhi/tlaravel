$(document).ready(function () {
    $("#modalEditCategory").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);

        const id = button.data("id");
        const name = button.data("name");

        $("#name").val(name);

        $("#formEditCategory").attr("action", `/category/${id}`);
    });
});

// Delete Category
$(document).on("click", ".deleteCategory", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Kategori "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteCategory").attr("action", `/category/${id}`);
            $("#formDeleteCategory").submit();
        }
    });
});

// select2
$("#modalTambahProduct, #modalEditProduct").on("shown.bs.modal", function () {
    $(this)
        .find(".select2")
        .select2({
            dropdownParent: $(this),
            width: "100%",
        });
});

// Edit Product
$("#modalEditProduct .select2").select2({
    dropdownParent: $("#modalEditProduct"),
    width: "100%",
});

$(document).ready(function () {
    $("#modalEditProduct").on("shown.bs.modal", function (event) {
        const button = $(event.relatedTarget);
        const modal = $(this);

        const categoryId = button.data("category");

        modal.find("#category_id").val(categoryId).trigger("change");

        modal.find("#product_name").val(button.data("name"));
        modal.find("#amount").val(button.data("amount"));
        modal.find("#qty").val(button.data("qty"));

        $("#formEditProduct").attr("action", `/product/${button.data("id")}`);
    });
});

// Delete Product
$(document).on("click", ".deleteProduct", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: `Produk "${name}" akan dihapus`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#formDeleteProduct").attr("action", `/product/${id}`);
            $("#formDeleteProduct").submit();
        }
    });
});

// Close Alert
document.addEventListener("DOMContentLoaded", function () {
    const alerts = document.querySelectorAll(".alert-dismissible");

    alerts.forEach((alert) => {
        setTimeout(() => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        }, 2000);
    });
});
