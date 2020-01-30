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

        if (count($form) === 3) {
            return Redirect::to('/contact');
        }

        /**
         * Recaptcha v2
         */
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => Config::get('app.reCAPTCHA'),
            'response' => post("g-recaptcha-response")
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);

        $captcha_success=json_decode($verify);

        if ($captcha_success->success == false) {
            return Redirect::to('/contact')->with('status', 'There was an issue sending your message (ahem, Bot).');
        }

        return $this->addMessage($form);
    }

    private function addMessage($form)
    {
        $newContact = new Message();

        $newContact->name = $form['name'];
        $newContact->email = $form['email'];
        $newContact->subject = $form['subject'];
        $newContact->message = $form['message'];

        $newContact->save();

        return Redirect::to('/contact/thanks');
    }
}
