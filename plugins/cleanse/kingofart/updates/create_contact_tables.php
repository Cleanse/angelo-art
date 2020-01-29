<?php

namespace Cleanse\KingofArt\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateContactTable extends Migration
{
    public function up()
    {
        Schema::create('cleanse_koa_contact_messages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('subject', 100);
            $table->text('message');
            $table->integer('is_new')->unsigned()->default(1);
            $table->integer('is_starred')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cleanse_koa_contact_messages');
    }
}
