<?php namespace Evanamezcua\Philter\Models;

use Model;

/**
 * Model
 */
class Image extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'evanamezcua_philter_image';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    // fetch latest 8 images
    public function scopeLatest($query)
    {
        return $query->take(8)->orderBy('id', 'desc');
    }

    // fetch latest without current user
    public function scopeOthersImages($query, $user_id)
    {
        return $query->where('user_id', '!=', $user_id);
    }

    // fetch user images
    public function usersImages($query, $user_id)
    {
        return $query->where('user_id', $user_id)->orderBy('id', 'desc');
    }

     /*
     * Relations
     */
    public $belongsTo = [
        'user' => ['RainLab\User\Models\User']
    ];
    
    public $attachOne = [
        'image' => ['System\Models\File']
    ];
 
    public $belongsToMany = [
        'tags' => [
            'Evanamezcua\Philter\Models\Tag',
            'table' => 'evanamezcua_philter_image_tag',
            'order' => 'tag'
        ]
    ];
}
