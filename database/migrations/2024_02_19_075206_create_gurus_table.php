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
            $table->string('namaguru');
            $table->string('mapel');
            $table->string('tahunajaran');
            $table->string('semester');
            $table->string('judulmateri');
            $table->text('deskripsimateri');
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
