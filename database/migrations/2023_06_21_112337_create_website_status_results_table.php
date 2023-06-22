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
        Schema::create('website_status_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('website_id');
            $table->string('url');
            $table->boolean('status')->default(false);
            $table->timestamp('check_time')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_status_results');
    }
};
