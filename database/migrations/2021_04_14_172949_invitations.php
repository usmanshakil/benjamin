<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invitations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                    Schema::create('invitations', function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('subject');
                        $table->string('name');
                        $table->string('email')->unique();
                        $table->string('invitation_token', 32)->unique()->nullable();
                        $table->timestamp('registered_at')->nullable();
                        $table->timestamps();
                    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
