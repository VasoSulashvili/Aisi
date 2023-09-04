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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_type_id');
            $table->unsignedBigInteger('album_id');
            $table->string('image');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('address')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();

            $table->foreign('event_type_id')->references('id')->on('event_types');
            $table->foreign('album_id')->references('id')->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
