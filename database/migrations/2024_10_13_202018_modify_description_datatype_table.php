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
        Schema::table('courtdates', function (Blueprint $table) {
            $table->dropColumn('description'); // Drop the original column
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courtdates', function (Blueprint $table) {
            $table->dropColumn('description'); // Drop the new column
            $table->string('description')->nullable();
        });
    }
};
