<?php

namespace Cleanse\KingOfArt;

use Backend;
use Controller;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'King of Art Plugin',
            'description' => 'Provides functionality for Angelo\'s website.',
            'author' => 'Paul E. Lovato',
            'icon' => 'icon-font'
        ];
    }

    public function registerComponents()
    {
        return [
            'Cleanse\KingOfArt\Components\Featured' => 'cleanseKingFeatured',
            'Cleanse\KingOfArt\Components\Gallery' => 'cleanseKingGallery',
            'Cleanse\KingOfArt\Components\ArtPrint' => 'cleanseKingPrint',
            'Cleanse\KingOfArt\Components\About' => 'cleanseKingAbout',
            'Cleanse\KingOfArt\Components\Contact' => 'cleanseKingContact'
        ];
    }

    public function registerNavigation()
    {
        return [
            'angelo' => [
                'label' => 'King of Art',
                'url' => Backend::url('cleanse/kingofart/creations'),
                'icon' => 'icon-pencil',
                'iconSvg' => 'plugins/cleanse/kingofart/assets/images/angelo.svg',
                'permissions' => ['cleanse.kingofart.*'],
                'order' => 33,
                'sideMenu' => [
                    'creations' => [
                        'label' => 'Art List',
                        'icon' => 'icon-copy',
                        'url' => Backend::url('cleanse/kingofart/creations'),
                        'permissions' => ['cleanse.kingofart.manage_art']
                    ],
                    'new_art' => [
                        'label' => 'New Art',
                        'icon' => 'icon-plus',
                        'url' => Backend::url('cleanse/kingofart/creations/create'),
                        'permissions' => ['cleanse.kingofart.manage_art']
                    ]
                ]
            ]
        ];
    }
}