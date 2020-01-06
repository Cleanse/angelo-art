<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;

class ContactThanks extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Contact Thanks Page',
            'description' => 'Displays a thank you message after using the contact form.'
        ];
    }
}
