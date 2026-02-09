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
        Schema::create('postalcodes', function (Blueprint $table) {
            $table->id();
            //$table->integer('county_id')->nullable();
            $table->foreignId('county_id')->nullable()->references('id')->on('counties')->onDelete('set null');
            $table->unsignedBigInteger('code');
            $table->string('placename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postalcodes');
    }
};
