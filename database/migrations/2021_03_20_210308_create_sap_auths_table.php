<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_auths', function (Blueprint $table) {
            $table->id();
            $table->string('pid_auth')->unique();
            $table->string('pid_user');
            $table->string('config_type');
            $table->string('auth_name');
            $table->string('auth_type');
            $table->string('post_url');
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('sap_auths');
    }
}
