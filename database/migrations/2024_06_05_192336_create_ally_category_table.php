<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('ally_category')) {
            Schema::create('ally_category', function (Blueprint $table) {
                $table->foreignId('ally_id')->constrained()->onDelete('cascade');
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->primary(['ally_id', 'category_id']);
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('ally_category');
    }
};
