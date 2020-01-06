<?php

namespace Cleanse\KingOfArt\Models;

use Model;

class Message extends Model
{
    use \October\Rain\Database\Traits\SoftDelete;

    protected $table = 'cleanse_koa_contact_messages';

    protected $dates = ['deleted_at'];

    public function scopeIsNew($query)
    {
        return $query
            ->where('is_new', true);
    }

    public function scopeIsStarred($query)
    {
        return $query
            ->where('is_starred', true);
    }
}
