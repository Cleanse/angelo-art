<?php

namespace Cleanse\KingOfArt\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Redirect;

use Cleanse\KingOfArt\Models\Message;

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
        $form = post();

        return $form;

        if (count($form) === 3) {
            return Redirect::to('/contact');
        }

        if (!isset($form['g-recaptcha-response'])) {
            return Redirect::to('/contact');
        }

        return $this->addMessage($form);
    }

    private function addMessage($form)
    {
        $newContact = new Message();

        $newContact->name = $form['name'];
        $newContact->email = $form['email'];
        $newContact->message = $form['message'];

        $newContact->save();

        return Redirect::to('/contact/thanks');
    }
}
