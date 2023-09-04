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
        Schema::create('award_dancer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dancer_id');
            $table->unsignedBigInteger('award_id');
            $table->timestamps();

            $table->foreign('dancer_id')->references('id')->on('dancers');
            $table->foreign('award_id')->references('id')->on('awards');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('award_dancer');
    }
};
