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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('kwh_today');
            $table->string('kwh_last');
            $table->string('tl');
            $table->string('kvarh');
            $table->string('voltA');
            $table->string('voltB');
            $table->string('voltC');
            $table->string('currA');
            $table->string('currB');
            $table->string('currC');
            $table->string('freq');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
