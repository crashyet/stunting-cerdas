<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('edukasi', function (Blueprint $table) {
        $table->enum('status', ['draft', 'publish'])->default('draft');
    });
}

public function down()
{
    Schema::table('edukasi', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
