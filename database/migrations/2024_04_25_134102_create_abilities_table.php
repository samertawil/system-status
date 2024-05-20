<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            $table->string('ability_name')->unique();
            $table->string('ability_description');
            $table->string('url')->nullable();
            $table->enum('activation',['active','not active'])->default('active');
            $table->foreignId('status_id')->nullable()->constrained('statuses');
            $table->foreignId('module_id')->nullable()->constrained('statuses');
            $table->text('description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('abilities');
    }
};
