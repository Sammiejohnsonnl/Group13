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
        Schema::table('products', function (Blueprint $table) {
            $table->string('image_path')->nullable()->change(); // Make image_path nullable
            $table->text('description')->nullable(); // Add description column
            $table->timestamps(); // Adding timestamps (created_at and updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image_path')->nullable(false)->change(); // Revert image_path to not nullable
            $table->dropColumn('description'); // Remove description column
            $table->dropTimestamps(); // Remove timestamps (created_at and updated_at)
        });
    }
};
