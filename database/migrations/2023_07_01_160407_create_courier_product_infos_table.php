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
        Schema::create('courier_product_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('courier_type');
            $table->double('courier_quantity', 8, 2);
            $table->double('courier_fee', 8, 2);
            $table->text('courier_details')->nullable();
            $table->string('courier_code');

            $table->unsignedBigInteger('shipment_mode_id')->index();

            $table->foreign('shipment_mode_id')
                    ->references('id')
                    ->on('shipment_modes');

            $table->unsignedBigInteger('courier_info_id')->index();

            $table->foreign('courier_info_id')
                    ->references('id')
                    ->on('courier_infos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_product_infos');
    }
};
