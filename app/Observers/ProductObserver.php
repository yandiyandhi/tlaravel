<?php

namespace App\Observers;

use App\Models\product;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     */
    public function created(product $product): void
    {
        ActivityLog::create([
            'user_name' => Auth::user()?->username ?? 'Guest',
            'action'    => 'create',
            'model'     => 'Product',
            'model_id'  => $product->id,
            'new_data'  => $product->toArray(),
            'description' => "Produk baru dibuat: {$product->product_name}"
        ]);
    }

    /**
     * Handle the product "updated" event.
     */
    public function updated(product $product): void
    {
        ActivityLog::create([
            'user_name' => Auth::user()?->username ?? 'Guest',
            'action'    => 'update',
            'model'     => 'Product',
            'model_id'  => $product->id,
            'old_data'  => $product->getOriginal(),
            'new_data'  => $product->getChanges(),
            'description' => "Produk diubah: {$product->product_name}"
        ]);
    }

    /**
     * Handle the product "deleted" event.
     */
    public function deleted(product $product): void
    {
        ActivityLog::create([
            'user_name' => Auth::user()?->username ?? 'Guest',
            'action'    => 'delete',
            'model'     => 'Product',
            'model_id'  => $product->id,
            'old_data'  => $product->toArray(),
            'description' => "Produk dihapus: {$product->product_name}"
        ]);
    }

    /**
     * Handle the product "restored" event.
     */
    public function restored(product $product): void
    {
        ActivityLog::create([
            'user_name' => Auth::user()?->username ?? 'Guest',
            'action'    => 'restore',
            'model'     => 'Product',
            'model_id'  => $product->id,
            'new_data'  => $product->toArray(),
            'description' => "Produk direstore: {$product->product_name}"
        ]);
    }

    /**
     * Handle the product "force deleted" event.
     */
    public function forceDeleted(product $product): void
    {
        //
    }
}
