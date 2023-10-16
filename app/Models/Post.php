<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['link', 'title', 'description', 'source', 'pub_date'];
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'posts_categories',
            'post_id',
            'category_id'
        );
    }

}
