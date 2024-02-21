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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('guru');
            $table->string('mapel');
            $table->unsignedInteger('tahun');
            $table->string('judul');
            $table->text('deskripsi');
            $table->softDeletes();
            $table->timestamps();
        });
        // Schema::table('materials', function (Blueprint $table) {
        //     $table->unsignedTinyInteger('semester')->default(1)->after('year');
        // });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
