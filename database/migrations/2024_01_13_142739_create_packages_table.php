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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('slug');
            $table->double('price');
            $table->integer('number_of_days');
            $table->integer('number_of_listings');
            $table->integer('number_of_photos');
            $table->integer('number_of_videos');
            $table->integer('number_of_amenities');
            $table->integer('number_of_featured_listings');
            $table->boolean('show_at_home');
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
