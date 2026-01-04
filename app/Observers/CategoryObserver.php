<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Category',
            'model_id'    => $category->id,
            'new_data'    => $category->toArray(),
            'description' => "Kategori baru dibuat: {$category->name}",
        ]);
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'Category',
            'model_id'    => $category->id,
            'old_data'    => $category->getOriginal(),
            'new_data'    => $category->getChanges(),
            'description' => "Kategori diperbarui: {$category->name}",
        ]);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'delete',
            'model'       => 'Category',
            'model_id'    => $category->id,
            'old_data'    => $category->toArray(),
            'description' => "Kategori dihapus: {$category->name}",
        ]);
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'restore',
            'model'       => 'Category',
            'model_id'    => $category->id,
            'new_data'    => $category->toArray(),
            'description' => "Kategori direstore: {$category->name}",
        ]);
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}
