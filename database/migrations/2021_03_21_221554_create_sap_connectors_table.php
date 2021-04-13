<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapConnectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_connectors', function (Blueprint $table) {
            $table->id();
            $table->string('pid_conn')->unique();
            $table->string('pid_user');
            $table->string('pid_coco');
            $table->string('pid_extapi');
            $table->string('config_type');
            $table->text('conn_description')->nullable();
            $table->string('conn_type')->nullable();
            $table->string('conn_time_type')->nullable();
            $table->string('conn_apicall_time')->nullable();
            $table->string('conn_status1')->nullable();
            $table->string('conn_status2')->nullable();
            $table->string('conn_ext1')->nullable();
            $table->string('conn_ext2')->nullable();
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
        Schema::dropIfExists('sap_connectors');
    }
}
