@extends('layouts.app')
@section('title', 'Category')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- / Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">

            @include('partials.alert')

            <div class="row g-6">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Category</h5>
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalTambahCategory">
                                <i class="ti ti-plus me-1"></i> Add Category
                            </a>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <!-- Edit -->
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-sm btn-icon btn-outline-primary cursor-pointer"
                                                        title="Edit" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditCategory" data-id="{{ $category->uuid }}"
                                                        data-name="{{ $category->name }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <!-- Delete -->
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-outline-danger deleteCategory"
                                                        data-id="{{ $category->uuid }}" data-name="{{ $category->name }}"
                                                        title="Hapus" id="confirm-text">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Data tidak ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="formDeleteCategory" method="POST">
        @csrf
        @method('DELETE')
    </form>


    @include('masterdata.category.createcategory')
    @include('masterdata.category.editcategory')
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
