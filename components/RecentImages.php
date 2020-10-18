<?php namespace Evanamezcua\Philter\Components;

use Auth;
use Cms\Classes\ComponentBase;
use Evanamezcua\Philter\Models\Image as ImageModel;

class RecentImages extends ComponentBase
{

    public $images;

    public function componentDetails()
    {
        return [
            'name'        => 'RecentImages Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRender() 
    {
        $user = Auth::getUser();
        if (is_object($user)) {
            $this->images = ImageModel::othersImages($user->id)->latest()->get();    
        } else {
            $this->images = ImageModel::latest()->get();
        }
    }
}
