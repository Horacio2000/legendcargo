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
        Schema::create('courier_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id')->index();
            $table->foreign('unit_id')
                    ->references('id')
                    ->on('units')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('shipment_mode_id')->index();
            $table->foreign('shipment_mode_id')
                    ->references('id')
                    ->on('shipment_modes')
                    ->onDelete('cascade');
            $table->double('price', 8, 2);
            $table->string('name');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_types');
    }
};
