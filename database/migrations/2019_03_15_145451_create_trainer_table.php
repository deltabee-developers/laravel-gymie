<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('trainer', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name', 50);
          $table->string('address', 100);
          //$table->string('email', 50)->unique('email')->comment('member\'s email id');
          $table->date('DOB')->comment('member\'s date of birth');
          $table->char('gender', 50)->comment('member\'s gender');
          $table->string('proof_photo', 50)->comment('photo of the proof');
          $table->string('education',50);
          $table->string('languages',50);
          $table->string('timings',100);
          $table->string('certification',50);
          $table->timestamps();
          $table->integer('created_by')->unsigned()->index('FK_trn_enquiry_followups_mst_staff_2');
          $table->integer('updated_by')->unsigned()->index('FK_trn_enquiry_followups_mst_staff_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trainer');
    }
}
