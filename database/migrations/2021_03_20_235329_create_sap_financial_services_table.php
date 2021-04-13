<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapFinancialServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_financial_services', function (Blueprint $table) {
            $table->id();
            $table->string('pid_fsrv')->unique();
            $table->string('pid_fsys');
            $table->string('pid_user');
            $table->string('config_type');
            $table->string('fsrv_name');
            $table->string('fsrv_api_endpoint');
            $table->text('fsrv_description')->nullable();
            $table->string('fsrv_status1')->nullable();
            $table->string('fsrv_status2')->nullable();
            $table->string('fsrv_ext1')->nullable();
            $table->string('fsrv_ext2')->nullable();
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
        Schema::dropIfExists('sap_financial_services');
    }
}
