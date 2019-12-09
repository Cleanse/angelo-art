<?php

namespace Cleanse\KingOfArt\Models;

use Model;

class Creation extends Model
{
    use \October\Rain\Database\Traits\Sluggable;

    protected $table = 'cleanse_koa_creations';

    /**
     * @var array Generate slugs for these attributes.
     */
    protected $slugs = [
        'slug' => 'title'
    ];

    public $attachOne = [
        'image' => 'System\Models\File'
    ];

    public function scopeIsVisible($query)
    {
        return $query
            ->where('is_hidden', false);
    }

    public function scopeIsFeatured($query)
    {
        return $query
            ->where('is_featured', true);
    }
}
