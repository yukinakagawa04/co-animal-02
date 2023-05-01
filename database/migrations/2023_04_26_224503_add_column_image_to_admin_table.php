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
         Schema::table('admins', function (Blueprint $table) {
            // もし"prefecture"というカラムがまだ存在しない場合のみ、カラムを追加する
            if (!Schema::hasColumn('admins', 'prefecture')) {
                $table->string('prefecture')->nullable()->after('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
