<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('redirector_resources', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->string('type');
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_term')->nullable();
            $table->string('utm_content')->nullable();
            $table->foreignId('redirector_campaign_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redirector_resources');
    }
};
