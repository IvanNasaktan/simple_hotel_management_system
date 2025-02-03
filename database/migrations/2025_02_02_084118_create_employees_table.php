<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // database/migrations/xxxx_xx_xx_create_employees_table.php
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();                       // id
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_initial', 1)->nullable();
            $table->enum('suffix', ['jr', 'sr'])->nullable();
            $table->integer('age');
            $table->unsignedBigInteger('user_id');  // Foreign key to users table
            $table->unsignedBigInteger('role_id');  // Foreign key to roles table
            $table->date('date_employed');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }

};
