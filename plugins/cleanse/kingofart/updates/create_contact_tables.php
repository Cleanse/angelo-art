<?php

namespace Acme\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateContactTable extends Migration
{
    public function up()
    {
        Schema::create('cleanse_koa_contact_forms', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('cleanse_koa_contact_fields', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('form_id')->unsigned()->index();
            $table->string('name');
            $table->string('type');
            $table->string('placeholder')->nullable();
            $table->text('description')->nullable();
            $table->json('options')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cleanse_koa_contact_fields');
        Schema::drop('cleanse_koa_contact_forms');
    }
}
