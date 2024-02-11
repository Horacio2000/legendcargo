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
        Schema::create('courier_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->nullable();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

            $table->string('sender_name');
            $table->string('sender_email')->nullable();
            $table->string('sender_phone');
            $table->text('sender_address')->nullable();
            $table->unsignedBigInteger('receiver_branch_id')->index();

            $table->foreign('receiver_branch_id')
                    ->references('id')
                    ->on('branches');

            $table->string('receiver_name');
            $table->string('receiver_email')->nullable();
            $table->string('receiver_phone');
            $table->text('receiver_address')->nullable();
            $table->string('invoice_id');
            $table->enum('status', ['Non reçu', 'Reçu', 'Chargé', 'Arrivé à destination', 'Retiré'])->default('Non reçu');

            $table->unsignedBigInteger('receiver_branch_staff_id')->index()->nullable();

            $table->foreign('receiver_branch_staff_id')
                    ->references('id')
                    ->on('users');

            $table->integer('payment_receiver_id')->nullable();

            $table->integer('payment_branch_id')->nullable();

            $table->enum('payment_status', ['Non payé', 'Payé'])->default('Non payé');

            $table->string('payment_method_name')->nullable();

            $table->string('payment_transaction_id')->nullable();

            $table->string('payment_date')->nullable();

            $table->double('payment_balance', 8, 2)->nullable();

            $table->string('payment_transaction_image')->nullable();

            $table->text('payment_note')->nullable();

            $table->string('code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_infos');
    }
};
