<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;

class Contact extends ComponentBase
{
    private $contact;

    public function componentDetails()
    {
        return [
            'name' => 'Contact the Artist',
            'description' => 'Displays a contact form for the visitor.'
        ];
    }
}
