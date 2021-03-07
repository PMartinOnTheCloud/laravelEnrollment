<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReqEnrolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('req_enrol', function (Blueprint $table) {
            $table->id();
            $table->foreign('req_id')->references('id')->on('requirements');
            $table->foreign('enrolment_id')->references('id')->on('enrolments');
            $table->enum('state', ['','']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('req_enrol');
    }
}
