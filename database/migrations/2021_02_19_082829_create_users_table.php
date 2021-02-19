<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->enum('role',['superadmin','candidate']);
            $table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
			$table->integer('phone_number');
            $table->date('birth_date');
            $table->string('qualification',30);
            $table->integer('percentage');
            $table->integer('passing_year');
            $table->integer('mathematic_10th');
            $table->integer('mathematic_12th');
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
        Schema::dropIfExists('users');
    }
}
