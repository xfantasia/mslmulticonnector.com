<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapCommunicationArrangementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_communication_arrangements', function (Blueprint $table) {
            $table->id();
            $table->string('pid_ca')->unique();
            $table->string('pid_user');
            $table->string('pid_fsrv');
            $table->string('config_type');
            $table->string('ca_name');
            $table->string('ca_type');
            $table->string('ca_tenant_url');
            $table->string('ca_description')->nullable();
            $table->string('ca_username');
            $table->string('ca_password');
            $table->string('ca_status1')->nullable();
            $table->string('ca_status2')->nullable();
            $table->string('ca_ext1')->nullable();
            $table->string('ca_ext2')->nullable();
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
        Schema::dropIfExists('sap_communication_arrangements');
    }
}
