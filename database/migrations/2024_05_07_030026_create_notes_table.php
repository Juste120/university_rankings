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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
            $table->foreignId('criteria_id')->nullable();
            $table->float('value');
            $table->timestamps();
        });

        // Add foreign key constraint only if 'criterias' table exists
        if (Schema::hasTable('criterias')) {
            Schema::table('notes', function (Blueprint $table) {
                $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
