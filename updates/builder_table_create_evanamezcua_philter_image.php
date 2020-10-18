<?php namespace Evanamezcua\Philter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEvanamezcuaPhilterImage extends Migration
{
    public function up()
    {
        Schema::create('evanamezcua_philter_image', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->text('name');
            $table->text('description')->nullable();
            $table->integer('user_id');
            $table->text('filter');
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('evanamezcua_philter_image');
    }
}
