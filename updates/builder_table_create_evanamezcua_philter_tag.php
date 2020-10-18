<?php namespace Evanamezcua\Philter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEvanamezcuaPhilterTag extends Migration
{
    public function up()
    {
        Schema::create('evanamezcua_philter_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->text('tag');
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('evanamezcua_philter_tag');
    }
}
