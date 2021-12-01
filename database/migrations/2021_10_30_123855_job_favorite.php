<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobFavorite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_favorite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user')->cascadeOnDelete();
            $table->foreignId('job_id')->constrained('job')->cascadeOnDelete();
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
        Schema::dropIfExists('job_favorite');
    }
}
