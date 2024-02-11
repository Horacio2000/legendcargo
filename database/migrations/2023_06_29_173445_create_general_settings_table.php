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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->string('header_title')->nullable();
            $table->string('search_courier_title')->nullable();
            $table->text('search_courier_details')->nullable();
            $table->enum('email_notification', [0, 1])->default(0);
            $table->string('email_sent_from')->nullable();
            $table->longText('email_template')->nullable();
            $table->text('sms_api')->nullable();
            $table->integer('departure_courier')->nullable();
            $table->integer('upcoming_courier')->nullable();
            $table->integer('total_deliver')->nullable();
            $table->enum('sms_notification', [0, 1])->default(0);
            $table->enum('registration_verification', [0, 1])->default(0);
            $table->enum('email_verification', [0, 1])->default(0);
            $table->enum('sms_verification', [0, 1])->default(0);
            $table->string('base_currency')->nullable();
            $table->string('base_currency_symbol')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
