<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gender_id');
            $table->foreignId('role_id');

            $table->string('first_name', 25);
            $table->string('middle_name', 25)->nullable();
            $table->string('last_name', 25);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->string('display_picture_link');
            $table->integer('delete_flag')->nullable();
            $table->date('modified_at')->nullable();
            $table->string('modified_by')->nullable();
            $table->rememberToken();

            $table->foreign('gender_id')->references('gender_id')->on('gender')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('role')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('account');
    }
}
