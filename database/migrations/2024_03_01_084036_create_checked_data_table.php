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
        Schema::create('checked_data', function (Blueprint $table) {
            $table->id('checked_id');
            $table->string('student_id');
            $table->date('date');
            $table->time('time_checked_in');
            $table->time('time_checked_out');
            $table->string('status');
            $table->timestamps();
        
            $table->foreign('student_id')->references('student_id')->on('student_data')->onDelete('cascade')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checked_data', function (Blueprint $table) {
            $table->dropForeign('checked_data_student_id_foreign');
        });
        
        Schema::dropIfExists('checked_data');
    }
};
