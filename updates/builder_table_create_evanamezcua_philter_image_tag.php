<?php namespace Evanamezcua\Philter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEvanamezcuaPhilterImageTag extends Migration
{
    public function up()
    {
        Schema::create('evanamezcua_philter_image_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('image_id');
            $table->integer('tag_id');
            $table->primary(['image_id','tag_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('evanamezcua_philter_image_tag');
    }
}
