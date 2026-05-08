<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_addons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->foreignId('addon_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['menu_id', 'addon_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_addons');
    }
};

