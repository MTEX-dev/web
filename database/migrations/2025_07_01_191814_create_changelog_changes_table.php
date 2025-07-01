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
        Schema::create('changelog_changes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('changelog_id');
            $table->string('name');
            $table->string('type');
            $table->timestamp('occurred_at')->nullable(); 
            $table->timestamps();

            $table->foreign('changelog_id')->references('id')->on('changelogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('changelog_changes');
    }
};
