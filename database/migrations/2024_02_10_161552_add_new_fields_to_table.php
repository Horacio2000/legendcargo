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
        Schema::table('courier_product_infos', function (Blueprint $table) {
            //
            $table->text('courier_content');
            $table->double('courier_article_number', 8, 2);
            $table->double('courier_price', 8, 2);
            $table->date('courier_date_sent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courier_product_infos', function (Blueprint $table) {
            //
        });
    }
};
