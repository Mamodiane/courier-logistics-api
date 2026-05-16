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
        
        Schema::create('parcels', function (Blueprint $table) {
    $table->id();
    $table->string('tracking_number')->unique();
    $table->string('sender_name');
    $table->string('sender_phone');
    $table->string('receiver_name');
    $table->string('receiver_phone');
    $table->text('pickup_address');
    $table->text('delivery_address');
    $table->text('parcel_description')->nullable();
    $table->decimal('weight', 8, 2)->nullable();
    $table->enum('status', [
        'pending',
        'collected',
        'in_transit',
        'delivered',
        'cancelled'
    ])->default('pending');
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};
