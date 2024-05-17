<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeralatansTable extends Migration
{
    public function up()
    {
        Schema::create('peralatan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alat')->unique();
            $table->string('nama_alat');
            $table->text('deskripsi')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peralatan');
    }
}
