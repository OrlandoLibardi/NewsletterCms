<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('newsletter_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('email');
            $table->integer('status')->default(0)->comment('0 not confirmed, 1 confirmed');
            $table->timestamps();
            $table->foreign('newsletter_id')
                  ->references('id')
                  ->on('newsletters')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsletter_users');
    }
}
