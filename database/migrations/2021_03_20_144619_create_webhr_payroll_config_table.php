<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebhrPayrollConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhr_payroll_config', function (Blueprint $table) {
            $table->id();
            $table->string('pid_config')->unique();
            $table->string('pid_user');
            $table->string('config_type');
            $table->string('config_name');
            $table->string('api_name');
            $table->string('get_url');
            $table->string('api_access_key');
            $table->string('api_secret_key');
            $table->text('authorization_code');
            $table->string('scope')->nullable();
            $table->string('status')->nullable();
            $table->string('ext1')->nullable();
            $table->string('ext2')->nullable();
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
        Schema::dropIfExists('webhr_payroll_config');
    }
}
