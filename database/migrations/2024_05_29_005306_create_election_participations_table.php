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
        Schema::create('election_participations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id')->nullable(false);
            $table->foreign('election_id')->references('id')->on('elections');
            $table->unsignedBigInteger('candidate_id')->nullable(false);
            $table->foreign('candidate_id')->references('id')->on('candidates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_participations');
    }
};
