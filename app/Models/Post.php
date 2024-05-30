<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'id'; // ça permet de choisir entre le slug ou $id
    }

    #Eager Loading avec la rélation Category::class
    protected $with = ['category', 'tags'];

    /**
     * Obtenir la catégorie à laquelle appartient la publication
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the tags for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFilters(Builder $query, array $filters): void
    {
        if (isset($filters['search'])) {
            $query->where('title', 'LIKE', '%' . $filters['search'] . '%')
                ->orWhere('description', 'LIKE', '%' . $filters['search'] . '%');
        }

        if (isset($filters['category'])) {
            $query->where('category_id', $filters['category']->id) ?? $filters['category'];
        }

        if (isset($filters['tag'])) {
            $query->whereRelation('tags', 'tags.id', $filters['tag']->id ?? $filters['tag']);
        }
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
