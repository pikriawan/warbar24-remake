<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    protected $fillable = [
        'admin_id',
        'name',
        'price',
        'category',
        'is_available',
        'image',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('menu_quantity');
    }

    #[Scope]
    protected function ofSearch(Builder $query, string $search): void
    {
        $query->where('name', 'like', '%' . $search . '%');
    }

    #[Scope]
    protected function ofCategory(Builder $query, string $category): void
    {
        $query->where('category', $category);
    }
}
