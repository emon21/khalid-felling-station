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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();

            // Company Information
            $table->string('site_name')->nullable();
            $table->string('site_logo')->nullable();     // store logo filename/path
            $table->string('site_favicon')->nullable();  // favicon optional
            $table->string('site_phone')->nullable();
            $table->string('site_email')->nullable();
            $table->text('site_address')->nullable();

            // SEO / Meta Info
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // Social Media Links
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();

            // Footer Info
            $table->string('copy_right')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
