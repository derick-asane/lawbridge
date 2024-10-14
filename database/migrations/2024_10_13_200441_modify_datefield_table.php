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
            $table->dropColumn('date'); // Drop the original column
            $table->datetime('datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courtdates', function (Blueprint $table) {
            $table->dropColumn('datetime'); // Drop the new column
            $table->timestamp('date')->nullable();
        });
    }
};
