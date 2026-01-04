<div class="modal fade" id="modalEditProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formEditProduct" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-2">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select select2" required>
                            <option value="">-- Pilih Category --</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Qty</label>
                        <input type="text" name="qty" id="qty" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
