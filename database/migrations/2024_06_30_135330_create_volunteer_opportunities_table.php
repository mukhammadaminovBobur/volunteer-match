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
        Schema::create('volunteer_opportunities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nonprofit_id');
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('location');
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            $table->foreign('nonprofit_id')->references('id')->on('nonprofits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_opportunities');
    }
};
