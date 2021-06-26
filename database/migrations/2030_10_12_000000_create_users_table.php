<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
        
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('address');
            $table->bigInteger('phone');
            $table->string('identity_type');
            $table->double('identity_number');
            $table->bigInteger('doctor_price')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('bloodsymbol_id');
            $table->unsignedBigInteger('maritalstatus_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('jop_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('bloodsymbol_id')->references('id')->on('blood_symbols')->onDelete('cascade');
            $table->foreign('maritalstatus_id')->references('id')->on('marital_statuses')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('jop_id')->references('id')->on('jops')->onDelete('cascade');
            $table->bigInteger('role');
            $table->rememberToken();
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
