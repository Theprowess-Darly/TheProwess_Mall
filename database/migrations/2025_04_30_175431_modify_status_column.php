<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->enum('status', ['pending', 'suspended', 'approved'])->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->enum('status', ['pending', 'active', 'suspended', 'approved'])->change();
        });
    }
}
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // Drop the existing status column and recreate it with the new enum values
            $table->dropColumn('status');
            $table->enum('status', ['pending', 'active', 'expired', 'cancelled', 'rejected'])->default('pending')->after('payment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // Restore the original status column with all possible values
            $table->dropColumn('status');
            $table->enum('status', ['pending', 'active', 'expired', 'cancelled', 'rejected'])->default('pending')->after('payment_id');
        });
    }
};
