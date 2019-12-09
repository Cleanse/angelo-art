<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;

use Cleanse\KingOfArt\Models\Creation;

class Gallery extends ComponentBase
{
    private $gallery;

    public function componentDetails()
    {
        return [
            'name' => 'Gallery of Art',
            'description' => 'Displays a collection of all images.'
        ];
    }

    public function onRun()
    {
        $this->page['default_image'] = '/plugins/cleanse/kingofart/assets/images/angelo.svg';
        $this->gallery = $this->page['gallery'] = $this->loadCreations();
    }

    protected function loadCreations()
    {
        return Creation::where('is_hidden', false)->orderBy('created_at', 'desc')->get();
    }
}
