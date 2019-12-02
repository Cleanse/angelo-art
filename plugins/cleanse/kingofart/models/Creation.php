<?php

namespace Cleanse\KingOfArt\Models;

use Model;

class Creation extends Model
{
    protected $table = 'cleanse_koa_creations';

    public $attachOne = [
        'image' => 'System\Models\File'
    ];
}
