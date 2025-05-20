<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advisory_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('designation');
            $table->string('logo');
            $table->string('image');
            $table->string('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advisory_teams');
    }
};
