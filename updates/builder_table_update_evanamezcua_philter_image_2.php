<?php namespace Evanamezcua\Philter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateEvanamezcuaPhilterImage2 extends Migration
{
    public function up()
    {
        Schema::table('evanamezcua_philter_image', function($table)
        {
            $table->integer('user_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('evanamezcua_philter_image', function($table)
        {
            $table->integer('user_id')->nullable(false)->change();
        });
    }
}
