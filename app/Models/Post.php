<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function sub(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this -> belongsTo(Subcategory::class);
    }

}
