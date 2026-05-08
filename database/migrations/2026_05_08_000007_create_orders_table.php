<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('order_type', ['dine_in', 'takeaway'])->default('dine_in');
            $table->string('table_number')->nullable();
            $table->enum('status', [
                'pending',
                'accepted',
                'preparing',
                'ready',
                'served',
                'completed',
                'cancelled',
            ])->default('pending');
            $table->enum('payment_method', ['card', 'bank', 'cash'])->default('cash');
            $table->enum('delivery_method', ['door_delivery', 'pick_up'])->default('pick_up');
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

