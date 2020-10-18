<?php namespace Evanamezcua\Philter;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Evanamezcua\Philter\Components\RecentImages' => 'RecentImages',
            'Evanamezcua\Philter\Components\UserImages' => 'UserImages',
            'Evanamezcua\Philter\Components\AddImages' => 'AddImages',
        ];
    }

    public function registerSettings()
    {
    }
}
