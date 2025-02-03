<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();            // role_id
            $table->string('role');  // e.g., 'admin', 'employee', 'customer'
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('roles');
    }
    
};
// database/migrations/xxxx_xx_xx_create_roles_table.php
