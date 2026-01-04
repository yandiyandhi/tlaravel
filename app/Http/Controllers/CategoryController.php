<?php

namespace App\Http\Controllers;

use DomainException;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\EditCategoryRequest;
use App\Services\Category\CategoryService;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')
            ->paginate(10);

        return view('masterdata.category.category', compact('categories'));
    }

    public function store(CreateCategoryRequest $request, CategoryService $categoryService)
    {
        $categoryService->store($request->validated());

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }

    public function update(EditCategoryRequest $request, Category $category, CategoryService $categories)
    {
        $categories->update($category, $request->validated());

        return redirect()->back()->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Category $category, CategoryService $categories)
    {
        try {
            $categories->delete($category);

            return redirect()
                ->back()
                ->with('success', 'Kategori berhasil dihapus');
        } catch (DomainException $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
