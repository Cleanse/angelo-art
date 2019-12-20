<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;

class Contact extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Contact the Artist',
            'description' => 'Displays a contact form for the visitor.'
        ];
    }

    public function onContact()
    {
        $form = false;

        if (!$form) {
            return 'Please fill out all fields.';
        }

        return 't e x t';
    }
}
