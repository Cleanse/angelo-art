<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;

class Featured extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Featured Art',
            'description' => 'Displays a collection of featured images.'
        ];
    }
}
