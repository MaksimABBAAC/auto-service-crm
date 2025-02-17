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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->integer('name_work_id');
            $table->integer('client_id');
            $table->integer('master_id');
            $table->foreign('name_work_id')->references('id')->on('name_work')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->foreign('master_id')->references('id')->on('master')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
