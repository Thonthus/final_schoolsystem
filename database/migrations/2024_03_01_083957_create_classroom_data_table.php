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
        Schema::create('classroom_data', function (Blueprint $table) {
            $table->string('class_id')->primary();
            $table->string('level_id');
            $table->string('class_grade');
            $table->string('class_num');
            $table->string('counselor_id')->nullable();
            $table->timestamps();


            $table->foreign('counselor_id')->references('counselor_id')->on('counselor_data')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('level_id')->references('level_id')->on('level_data')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classroom_data', function (Blueprint $table) {
            $table->dropForeign('classroom_data_counselor_id_foreign');
            $table->dropForeign('classroom_data_level_id_foreign');
        });

        Schema::dropIfExists('classroom_data');
    }
};
