<?php

namespace Cleanse\KingOfArt;

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
            'Cleanse\KingOfArt\Components\Featured' => 'cleanseKingFeatured'
        ];
    }
}