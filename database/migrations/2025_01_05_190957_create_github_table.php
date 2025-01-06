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
        Schema::create('github', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->text('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('blog')->nullable();
            $table->integer('public_repos')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('admin_email');
            $table->timestamps();

            $table->unique(['admin_email', 'login']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('github');
    }
};
