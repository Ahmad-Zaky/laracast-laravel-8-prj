<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ["title", "slug", "excerpt", "body", "published_at", "category_id"];
    
    protected $with = ["author", "category"];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn ($query) => 
                $query->where('title', 'like', '%'. trim($search) .'%')
                ->orWhere('excerpt', 'like', '%'. trim($search) .'%')
                ->orWhere('body', 'like', '%'. trim($search) .'%')
            )
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) => 
            $query->whereHas('category', fn ($query) => 
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn ($query, $author) => 
            $query->whereHas('author', fn ($query) => 
                $query->where('username', $author)
            )
        );

    }

}
