<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'id'; // ça permet de choisir entre le slug ou $id
    }

    #Eager Loading avec la rélation Category::class
    protected $with = ['category'];

    /**
     * Obtenir la catégorie à laquelle appartient la publication
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
