<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id('id_todos');            
            $table->string('title');
            $table->string('desc');        
            $table->date('deadline');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreignId('id_user')
                    ->constrained('users', 'id_user')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
