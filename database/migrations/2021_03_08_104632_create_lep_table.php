<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role',['admin','alumn']);
        });


        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->date('start');
            $table->date('end');
            $table->string('name');
            $table->text('description');
            $table->boolean('active');
        });


        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->string('name');
            $table->string('code');
            $table->text('description');
        });


        Schema::create('mps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')->references('id')->on('careers');
            $table->string('name');
            $table->string('code');
            $table->text('description');
        });


        Schema::create('ufs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mp_id');
            $table->foreign('mp_id')->references('id')->on('mps');
            $table->string('name');
            $table->string('code');
            $table->text('description');
        });


        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('career_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->foreign('career_id')->references('id')->on('careers');
            $table->string('dni');
            $table->enum('state',['active','inactive']);
        });


        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('uf_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('uf_id')->references('id')->on('ufs');
        });


        Schema::create('profile_reqs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });


        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->foreign('profile_id')->references('id')->on('profile_req');
            $table->string('name');
        });


        Schema::create('req_enrols', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('req_id');
            $table->unsignedBigInteger('enrolment_id');
            $table->foreign('req_id')->references('id')->on('requirements');
            $table->foreign('enrolment_id')->references('id')->on('enrolments');
            $table->enum('state',['active','inactive']);
        });


        Schema::create('enrolment_ufs', function (Blueprint $table) {
        	$table->unsignedBigInteger('uf_id');
        	$table->unsignedBigInteger('enrolment_id');
            $table->foreign('uf_id')->references('id')->on('ufs');
            $table->foreign('enrolment_id')->references('id')->on('enrolments');
        });


        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('req_enrol_id');
            $table->foreign('req_enrol_id')->references('id')->on('req_enrol');
            $table->binary('data')->nullable();
        });


        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('level');
            $table->text('message');
            $table->timestamp('time_action_realized', $precision=0);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('terms');
        Schema::drop('careers');
        Schema::drop('mps');
        Schema::drop('ufs');
        Schema::drop('enrolments');
        Schema::drop('records');
        Schema::drop('profile_req');
        Schema::drop('requirements');
        Schema::drop('req_enrol');
        Schema::drop('enrolments_ufs');
        Schema::drop('uploads');
        Schema::drop('logs');
    }
}
