<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('risk_assessment_details', function (Blueprint $table) {
            $table->unsignedBigInteger('header_id')->after('id');

            $table->foreign('header_id')->references('id')->on('risk_assessment_headers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('risk_assessment_details', function (Blueprint $table) {
            $table->dropForeign(['header_id']);
            $table->dropColumn('header_id');
        });
    }
};
