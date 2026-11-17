<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToRiskAssessmentHeadersTable extends Migration
{
    public function up()
    {
        Schema::table('risk_assessment_headers', function (Blueprint $table) {
            if (! Schema::hasColumn('risk_assessment_headers', 'shop_id')) {
                $table->unsignedBigInteger('shop_id')->nullable()->after('id');
                $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            }

            if (! Schema::hasColumn('risk_assessment_headers', 'date')) {
                $table->date('date')->nullable()->after('shop_id');
            }

            if (! Schema::hasColumn('risk_assessment_headers', 'detail_place')) {
                $table->text('detail_place')->nullable()->after('risk_reduction_proposal');
            }
        });
    }

    public function down()
    {
        Schema::table('risk_assessment_headers', function (Blueprint $table) {
            if (Schema::hasColumn('risk_assessment_headers', 'detail_place')) {
                $table->dropColumn('detail_place');
            }

            if (Schema::hasColumn('risk_assessment_headers', 'date')) {
                $table->dropColumn('date');
            }

            if (Schema::hasColumn('risk_assessment_headers', 'shop_id')) {
                $table->dropForeign(['shop_id']);
                $table->dropColumn('shop_id');
            }
        });
    }
}
