<?php

namespace Cleanse\KingOfArt\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

class Creations extends Controller
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

        BackendMenu::setContext('Cleanse.KingOfArt', 'kingofart', 'new_art');
    }

    public function index()
    {
        $this->asExtension('ListController')->index();
    }

    public function create()
    {
        BackendMenu::setContextSideMenu('new_art');

        $this->bodyClass = 'compact-container';

        return $this->asExtension('FormController')->create();
    }

    public function update($recordId = null)
    {
        $this->bodyClass = 'compact-container';

        return $this->asExtension('FormController')->update($recordId);
    }
}
