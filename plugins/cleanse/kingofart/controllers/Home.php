<?php

namespace Cleanse\KingOfArt\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

use Cleanse\KingOfArt\Models\Message;

class Home extends Controller
{
    public $requiredPermissions = ['cleanse.kingofart.manage_content'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Cleanse.KingOfArt', 'kingofart', 'home');
    }

    public function index()
    {
        $this->pageTitle = 'King of Art';
        $this->bodyClass = 'compact-container bg-primary';

        $this->vars['pageTitle'] = 'King of Art';

        $this->vars['messagesTotal'] = Message::isNew()->count();
        $this->vars['starredTotal'] = Message::isStarred()->count();
    }
}
