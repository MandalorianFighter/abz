<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('hire_date');
            $table->string('phone');
            $table->string('email');
            $table->float('salary');
            $table->integer('position_id');
            $table->integer('manager_id')->nullable();
            $table->integer('level');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->integer('admin_created_id');
            $table->integer('admin_updated_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
