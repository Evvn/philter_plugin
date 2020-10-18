<?php namespace Evanamezcua\Philter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEvanamezcuaPhilterImage extends Migration
{
    public function up()
    {
        Schema::table('evanamezcua_philter_image', function($table)
        {
            $table->increments('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('evanamezcua_philter_image', function($table)
        {
            $table->integer('id')->change();
        });
    }
}
