<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepositoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->string('name', 100)->index();
            $table->string('slug', 140)->index();
            $table->string('description')->nullable();
            $table->string('website')->nullable();
            $table->string('is_public')->default(true);
            $table->string('path')->index();
            $table->boolean('is_clone')->default(false);
            $table->string('clone_url')->nullable();
            $table->boolean('is_fork')->default(false);
            $table->unsignedInteger('fork_id')->nullable();
            $table->unique(['user_id', 'name']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repositories');
    }
}
