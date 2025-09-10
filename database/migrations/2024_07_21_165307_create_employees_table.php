<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('psn')->nullable();
            $table->string('full_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('present_qualification')->nullable();
            $table->string('qualification_at_entry')->nullable();
            $table->string('cadre_id')->nullable();
            $table->string('rank_id')->nullable();
            $table->string('grade_level')->nullable();
            $table->string('step')->nullable();
            $table->string('grade_level_at_entry')->nullable();
            $table->date('dob')->nullable();
            $table->date('dofa')->nullable();
            $table->date('dopa')->nullable();
            $table->string('station')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country')->nullable();
            $table->string('state_id')->nullable();
            $table->string('local_id')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bvn')->nullable();
            $table->string('nin')->nullable();
            $table->string('address')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('passport')->nullable();
            $table->string('salary_status')->default(0);
            $table->string('status')->default(0);
            $table->string('disability')->nullable();
            $table->string('verify')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
