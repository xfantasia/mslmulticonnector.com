<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapCommunicationComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_communication_components', function (Blueprint $table) {
            $table->id();
            $table->string('pid_coco')->unique();
            $table->string('pid_user');
            $table->string('pid_fsrv');
            $table->string('pid_ca');
            $table->string('coco_name');
            $table->string('config_type');
            $table->string('financial_services_wsdl_url')->nullable();
            $table->string('financial_services_sftp_url')->nullable();
            $table->string('coco_type')->nullable();
            $table->text('coco_description')->nullable();
            $table->string('coco_status1')->nullable();
            $table->string('coco_status2')->nullable();
            $table->string('coco_ext1')->nullable();
            $table->string('coco_ext2')->nullable();
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
        Schema::dropIfExists('sap_communication_components');
    }
}
