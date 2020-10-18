<?php namespace Evanamezcua\Philter\Components;

use Auth;
use Input;
use Flash;
use Redirect;
use Cms\Classes\ComponentBase;
use Evanamezcua\Philter\Models\Image as ImageModel;
use Evanamezcua\Philter\Models\Tag as TagModel;

class AddImages extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'AddImages Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function addImage()
    {
        $image = new ImageModel();
        $image->name = Input::get('title');
        $image->description = Input::get('description');
        $image->user = Auth::getUser();
        // going to comment this out due to error: 
        // SQLSTATE[HY000]: General error: 1364 Field 'disk_name' doesn't have a default value (SQL: insert into `system_files` (`is_public`, `field`, `attachment_id`, `attachment_type`, `updated_at`, `created_at`) values (1, image, 28, Evanamezcua\Philter\Models\Image, 2020-10-18 10:22:11, 2020-10-18 10:22:11))

        // this is documented as a known error with October CMS backend:
        // https://github.com/octobercms/october/issues/5270
        // fixed in a new version?
        // $image->image = Input::file('file');
        $image->filter = Input::get('filter');
        $image->save();
        $tags = Input::get('tags');
        $tag_array = explode(', ', $tags); // like JS string.split(', ');
        $tag_models = [];
        foreach ($tag_array as $tag) {
            $tag = ucfirst(strtolower(trim($tag)));
            $tag_models[] = TagModel::getTag($tag);
        }
        $image->tags()->attach($tag_models);
        $image->save();
        Flash::success('Your image has been uploaded');

        return Redirect::back();
    }
}
