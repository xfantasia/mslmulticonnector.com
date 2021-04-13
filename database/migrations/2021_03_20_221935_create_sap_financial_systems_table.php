<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSAPFinancialSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_financial_systems', function (Blueprint $table) {
            $table->id();
            $table->string('pid_fsys')->unique();
            $table->string('pid_user');
            $table->string('config_type');
            $table->string('fsys_name');
            $table->text('fsys_description')->nullable();
            $table->string('fsys_status1')->nullable();
            $table->string('fsys_status2')->nullable();
            $table->string('fsys_ext1')->nullable();
            $table->string('fsys_ext2')->nullable();
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
        Schema::dropIfExists('sap_financial_systems');
    }
}
