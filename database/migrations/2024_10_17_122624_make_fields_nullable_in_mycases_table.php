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
        Schema::table('mycases', function (Blueprint $table) {
            
            // Drop the foreign key constraint first
            $table->dropForeign(['user_id']);
            // Make these fields nullable
            $table->string('subject')->nullable()->change();
            $table->string('type')->nullable()->change();
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mycases', function (Blueprint $table) {
            // Drop the foreign key constraint before reverting changes
            $table->dropForeign(['user_id']);

            // Revert the `user_id` column to NOT NULL
            $table->integer('user_id')->nullable(false)->change();
            // Revert the other columns
            $table->string('subject')->nullable(false)->change();
            $table->string('type')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
        });
    }
};
