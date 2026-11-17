<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5sAuditsTable extends Migration
{
    public function up()
    {
        Schema::create('saudits', function (Blueprint $table) {
            $table->id();
            $table->string('shop');
            $table->date('date');
            $table->string('auditor');
            $table->json('scores');
            $table->float('final_score')->default(0);
            $table->text('comments')->nullable();
            $table->json('score_by_category')->nullable();
            $table->json('files')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saudits');
    }
}
