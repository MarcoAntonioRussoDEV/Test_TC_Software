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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->max(40)->required()->unique();
            $table->text('description');
            $table->string("status")->default("pending")->nullable();
            $table->date("completed_at")->nullable()->default(null);
            $table->timestamps();

            $table->foreign('status')->references('name')->on('statuses');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};