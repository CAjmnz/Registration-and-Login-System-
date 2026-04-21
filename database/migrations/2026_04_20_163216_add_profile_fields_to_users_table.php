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
    Schema::table('users', function (Blueprint $table) {

        if (!Schema::hasColumn('users', 'firstname')) {
            $table->string('firstname')->after('id');
        }

        if (!Schema::hasColumn('users', 'lastname')) {
            $table->string('lastname')->after('firstname');
        }

        if (!Schema::hasColumn('users', 'birthday')) {
            $table->date('birthday')->nullable()->after('lastname');
        }

        if (!Schema::hasColumn('users', 'address')) {
            $table->string('address')->nullable()->after('birthday');
        }

        if (!Schema::hasColumn('users', 'contactno')) {
            $table->string('contactno', 20)->nullable()->after('address');
        }

    });
}
    /**
     * Reverse the migrations.
     */
 public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'firstname',
            'lastname',
            'birthday',
            'address',
            'contactno'
        ]);
    });
}
};
