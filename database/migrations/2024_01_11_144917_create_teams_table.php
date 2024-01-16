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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id');
            $table->String('name');
            $table->foreignId('team_leader_id');
            $table->timestamps();
        });
        Schema::create('teamDetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('bp_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
