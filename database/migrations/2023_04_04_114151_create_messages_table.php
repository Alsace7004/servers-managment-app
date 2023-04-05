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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
           /*  $table->integer('sender_id');
            $table->integer('sent_to_id'); */
            $table->text('message');
            $table->timestamps();
            $table->foreignId('sender_id')->constrained('staff');
            $table->foreignId('sent_to_id')->constrained('staff');
            // `sender_id` field referenced the `id` field of `users` table:
            /*$table->foreign('sender_id')
                  ->references('id')
                  ->on('staff');*/

            // Let's add another foreign key on the same table,
            // but this time fot the `sent_to_id` field:
            /*$table->foreign('sent_to_id')
                  ->references('id')
                  ->on('staff');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
