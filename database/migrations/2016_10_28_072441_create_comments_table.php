<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->string('post_id');
            $table->primary('post_id');
            $table->string('thread_id');
            $table->string('thread_key');
            $table->string('author_id');
            $table->string('author_key');
            $table->string('author_name');
            $table->string('author_email');
            $table->string('author_url');
            $table->string('ip');
            $table->string('created_at');
            $table->text('message');
            $table->string('status');
            $table->string('type');
            $table->string('parent_id');
            $table->string('agent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
