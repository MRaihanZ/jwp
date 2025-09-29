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
        // User table
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name', 50);
            $table->string('username', 20);
            $table->text('email');
            $table->text('password');
            $table->string('phone_number', 20);
            $table->text('address');
            $table->enum('gender', ['male', 'female']);
            $table->text('avatar');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Catalog table
        Schema::create('catalog', function (Blueprint $table) {
            $table->id('catalog_id');
            $table->unsignedBigInteger('user_id');
            $table->text('title');
            $table->text('description');
            $table->integer('price');
            $table->text('image');
            $table->enum('status', ['available', 'unavailable']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('user_id')
                ->references('user_id')->on('user')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        // Orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('catalog_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name', 50);
            $table->text('email');
            $table->string('phone_number', 20);
            $table->text('address');
            $table->text('note');
            $table->date('wedding_date');
            $table->enum('status', ['requested', 'approved', 'rejected']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('catalog_id')
                ->references('catalog_id')->on('catalog')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('user_id')
                ->references('user_id')->on('user');
        });

        // Setting table
        Schema::create('setting', function (Blueprint $table) {
            $table->id('setting_id');
            $table->unsignedBigInteger('user_id');
            $table->text('website_name');
            $table->string('phone_number1', 20);
            $table->string('phone_number2', 20)->nullable();
            $table->text('email1');
            $table->text('email2')->nullable();
            $table->text('address');
            $table->text('maps')->nullable();
            $table->text('logo');
            $table->text('facebook_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('youtube_url')->nullable();
            $table->string('header_business_hour', 160);
            $table->text('time_business_hour');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('user_id')
                ->references('user_id')->on('user')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('catalog');
        Schema::dropIfExists('user');
    }
};
