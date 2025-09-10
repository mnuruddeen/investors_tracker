<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_recording');
            $table->string('owner_type_id');
            $table->string('owner_name');
            $table->string('owner_gender')->nullable();
            $table->string('specify')->nullable();
            $table->string('ownership_type_id');
            $table->date('date_of_issuance');
            $table->date('date_of_registration');
            $table->string('reference_no')->nullable();
            $table->string('enumerator_id')->nullable(); //user_id
            $table->string('document')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('certificates');
    }
}
