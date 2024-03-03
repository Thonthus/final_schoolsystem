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
        Schema::create('student_data', function (Blueprint $table) {
            $table->string('student_id')->primary();
            $table->string('class_id')->nullable();
            $table->string('number')->nullable();
            $table->string('student_img')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('nickname')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('personal_id')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamps();


            $table->foreign('class_id')->references('class_id')->on('classroom_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_data', function (Blueprint $table) {
            $table->dropForeign('student_data_class_id_foreign');
        });
        
        Schema::dropIfExists('student_data');
    }
};
