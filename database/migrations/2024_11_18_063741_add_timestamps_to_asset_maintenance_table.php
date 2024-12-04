<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToAssetMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('asset_maintenance', function (Blueprint $table) {
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asset_maintenance', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']); // Menghapus kolom jika migrasi dibatalkan
        });
    }
}
