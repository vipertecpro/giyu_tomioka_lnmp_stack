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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('featured_image')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('google_meta_title')->nullable();
            $table->string('google_meta_url')->nullable();
            $table->string('google_meta_description')->nullable();
            $table->string('facebook_meta_title')->nullable();
            $table->string('facebook_meta_description')->nullable();
            $table->string('twitter_meta_title')->nullable();
            $table->string('twitter_meta_description')->nullable();
            $table->string('status')->default('draft');
            $table->boolean('visibility')->default(false);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('published_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
