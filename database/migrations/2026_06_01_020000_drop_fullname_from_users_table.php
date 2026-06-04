<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('users', 'fullname')) {
            if (Schema::hasColumn('users', 'name')) {
                DB::update('UPDATE users SET name = fullname WHERE name IS NULL');
            }

            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('fullname');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('users', 'fullname')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('fullname')->after('name');
            });

            if (Schema::hasColumn('users', 'name')) {
                DB::update('UPDATE users SET fullname = name WHERE fullname IS NULL');
            }
        }
    }
};
