<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;

class About extends ComponentBase
{
    private $featured;

    public function componentDetails()
    {
        return [
            'name' => 'About the Artist',
            'description' => 'Displays an about message for the artist.'
        ];
    }
}
