<?php

namespace Cleanse\KingOfArt\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Cleanse\KingOfArt\Models\Message;

class Messages extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['cleanse.kingofart.manage_content'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Cleanse.KingOfArt', 'kingofart', 'messages');
    }

    public function index()
    {
        $this->vars['messagesTotal'] = Message::count();

        $this->asExtension('ListController')->index();
    }

    public function create()
    {
        BackendMenu::setContextSideMenu('new_reply');

        $this->bodyClass = 'compact-container';

        return $this->asExtension('FormController')->create();
    }

    //Read with some form data
    public function update($recordId = null)
    {
        $this->bodyClass = 'compact-container';

        return $this->asExtension('FormController')->update($recordId);
    }
}
