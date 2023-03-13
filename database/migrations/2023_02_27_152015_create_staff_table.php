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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('email')->unique();
            $table->string('photo');
            //$table->foreignId('role_id')->constrained('roles');
            $table->foreignId('departement_id')->constrained('departements');
            $table->foreignId('type_staff_id')->constrained('type_staff');
            $table->boolean('is_deleted')->default(0);
            $table->string('password');
            $table->boolean('checked')->default(1);
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
        Schema::dropIfExists('staff');
    }
};
