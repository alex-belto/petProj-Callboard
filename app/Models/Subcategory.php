<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this -> belongsTo(Category::class);
    }
    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this -> hasMany(Post::class);
    }
}
