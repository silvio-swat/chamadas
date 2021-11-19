<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('type')->nullable()->default(null)->after('description');
            $table->string('menu')->nullable()->default(null)->after('description');
            $table->string('controller')->nullable()->default(null)->after('description');
            $table->string('method')->nullable()->default(null)->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('menu');
            $table->dropColumn('controller');
            $table->dropColumn('method');
        });        
    }
}
