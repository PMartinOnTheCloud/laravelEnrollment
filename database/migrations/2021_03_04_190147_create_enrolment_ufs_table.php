<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentUfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_ufs', function (Blueprint $table) {
            $table->primary([
                $table->int('uf_id')->references('id')->on('ufs'),
                $table->foreign('enrolment_id')->references('id')->on('enrolments')
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolment_ufs');
    }
}
