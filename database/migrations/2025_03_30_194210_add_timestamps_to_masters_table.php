<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('masters', function (Blueprint $table) {
            $table->timestamps(); // Добавляет created_at и updated_at
        });
    }

    public function down()
    {
        Schema::table('masters', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
