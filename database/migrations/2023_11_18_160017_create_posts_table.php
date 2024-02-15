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
            $table->string('title')->nullable(false);
            $table->text('content')->nullable(false);
            $table->string('imgUrl', 255)->nullable();
            $table->string('extUrl', 255)->nullable();

            $table->foreignId('created_by')->nullable(false);
            $table->foreignId('deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // define fk constraints
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');

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
