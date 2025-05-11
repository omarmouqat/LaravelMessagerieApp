<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Primary key for the messages table
            $table->unsignedBigInteger('sender_id'); // Foreign key for sender
            $table->unsignedBigInteger('receiver_id'); // Foreign key for receiver
            $table->text('objective');
            $table->text('message'); // Column for the message content
            $table->timestamps(); // Created at and Updated at timestamps

            // Define foreign key constraints
            $table->foreign('sender_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Optional: What to do on user deletion

            $table->foreign('receiver_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Optional: What to do on user deletion
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
