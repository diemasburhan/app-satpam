<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jadwal_tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satpam_id')->constrained()->onDelete('cascade'); // Foreign key untuk satpam
            $table->date('tanggal'); // Tanggal tugas
            $table->string('shift'); // Shift kerja (Pagi/Malam)
            $table->string('area'); // Area yang harus dipantau
            $table->enum('status', ['pending', 'completed', 'needs_report'])->default('pending'); // Status tugas
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('jadwal_tugas');
    }
};