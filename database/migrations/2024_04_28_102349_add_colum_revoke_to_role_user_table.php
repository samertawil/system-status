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
        Schema::table('role_user', function (Blueprint $table) {
       
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('revoked_by')->nullable()->constrained('users');
            $table->date('revoke_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('revoked_by');
            $table->dropColumn('revoked_at');
        });
    }
};
