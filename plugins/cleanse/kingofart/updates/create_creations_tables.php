<?php

namespace Cleanse\KingofArt\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCreationsTable extends Migration
{
    public function up()
    {
        Schema::create('cleanse_koa_creations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->index();
            $table->text('excerpt')->nullable();
            $table->boolean('is_hidden')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cleanse_koa_creations');
    }
}
