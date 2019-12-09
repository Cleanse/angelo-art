<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;

use Cleanse\KingOfArt\Models\Creation;

class ArtPrint extends ComponentBase
{
    private $print;

    public function componentDetails()
    {
        return [
            'name' => 'Individual Art Page',
            'description' => 'Individual art page with options and information.'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title' => 'Print slug',
                'description' => 'Look up the art piece using the supplied slug value.',
                'default' => '{{ :slug }}',
                'type' => 'string'
            ]
        ];
    }

    public function onRun()
    {
        $this->print = $this->page['print'] = $this->loadPrint();
    }

    protected function loadPrint()
    {
        $slug = $this->property('slug');

        return Creation::isVisible()->where('slug', $slug)->first();
    }
}
