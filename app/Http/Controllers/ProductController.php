<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\Product\ProductService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $products = Product::orderBy('product_name')->paginate(10);

        return view('masterdata.product.product', compact(['categories', 'products']));
    }

    public function store(CreateProductRequest $request, ProductService $products)
    {
        $products->store($request->validated());

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function update(EditProductRequest $request, Product $product, ProductService $products)
    {
        $products->update($product, $request->validated());

        return redirect()->back()->with('success', 'Produk berhasil diubah');
    }

    public function destroy(Product $product, ProductService $products)
    {
        $products->delete($product);

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
}
