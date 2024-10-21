<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmProjectApprovalsTable extends Migration
{
    public function up()
    {
        Schema::create('am_project_approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pid');
            $table->string('pname');
            $table->date('busines_business_dates_date')->nullable();
            $table->string('approval_status');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
