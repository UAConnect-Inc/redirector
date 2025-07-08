<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('redirector_posts', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->foreignId('redirector_campaign_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redirector_posts');
    }
};
