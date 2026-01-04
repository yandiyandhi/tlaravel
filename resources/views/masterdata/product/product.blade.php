@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- / Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">

            @include('partials.alert')

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Product</h5>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambahProduct">
                        <i class="ti ti-plus me-1"></i> Add Product
                    </a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Qty</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->amount }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- Edit -->
                                            <a href="javascript:void(0)"
                                                class="btn btn-sm btn-icon btn-outline-primary cursor-pointer"
                                                title="Edit" data-bs-toggle="modal" data-bs-target="#modalEditProduct"
                                                data-id="{{ $product->uuid }}" data-name="{{ $product->product_name }}"
                                                data-category="{{ $product->category_id }}"
                                                data-amount="{{ $product->amount }}" data-qty="{{ $product->qty }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <!-- Delete -->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-outline-danger deleteProduct"
                                                data-id="{{ $product->uuid }}" data-name="{{ $product->product_name }}"
                                                title="Hapus" id="confirm-text">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data tidak ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form id="formDeleteProduct" method="POST">
        @csrf
        @method('DELETE')
    </form>

    @include('masterdata.product.createproduct')
    @include('masterdata.product.editproduct')
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
