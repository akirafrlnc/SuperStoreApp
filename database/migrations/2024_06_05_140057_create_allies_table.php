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
        if (!Schema::hasTable('ally_category')) {
            Schema::create('ally_category', function (Blueprint $table) {
                $table->uuid('ally_id')->constrained('allies')->onDelete('cascade');
                $table->uuid('category_id')->constrained('categories')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ally_category');
    }
};
