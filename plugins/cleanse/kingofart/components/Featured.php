<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;

use Cleanse\KingOfArt\Models\Creation;

class Featured extends ComponentBase
{
    private $featured;

    public function componentDetails()
    {
        return [
            'name' => 'Featured Art',
            'description' => 'Displays a collection of featured images.'
        ];
    }

    public function onRun()
    {
        $this->page['default_image'] = '/plugins/cleanse/kingofart/assets/images/angelo.svg';
        $this->featured = $this->page['featured'] = $this->loadCreations();
    }

    protected function loadCreations()
    {
        return Creation::where('is_featured', 1)->orderBy('created_at', 'desc')->get();
    }
}
