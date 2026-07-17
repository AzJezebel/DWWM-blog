<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'status', 'published_at', 'category_id', 'user_id',];
    protected $casts = ['published_at' => 'datetime',];
    protected $table = 'articles';

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Auto-generate slug on save
    protected static function booted()
    {
        static::saving(function ($article) {
            if (empty($article->slug) || $article->isDirty('title')) {
                $baseSlug = Str::slug($article->title);
                $slug = $baseSlug;
                $i = 1;
                while (
                    static::where('slug', $slug)
                        ->when($article->id, fn($q) => $q->where('id', '!=', $article->id))
                        ->exists()
                ) {
                    $slug = "{$baseSlug}-{$i}";
                    $i++;
                }
                $article->slug = $slug;
            }   

            // Set published_at when status becomes PUBLISHED
            if ($article->status === 'PUBLISHED' && empty($article->published_at)) {
                $article->published_at = now();
            }   

            // Optional: clear published_at if reverted to DRAFT
            if ($article->status === 'DRAFT') {
                $article->published_at = null;
            }
        });
    }
}
