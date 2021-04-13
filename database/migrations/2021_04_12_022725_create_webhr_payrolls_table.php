<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebhrPayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhr_payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('pid_payroll')->unique();
            $table->string('company_name');
            $table->string('station_name');
            $table->string('division_name');
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('total_salary');
            $table->string('salary_date');
            $table->string('salary_period_start_date');
            $table->string('salary_period_end_date');
            $table->string('status1')->nullable();
            $table->string('status2')->nullable();
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
        Schema::dropIfExists('webhr_payrolls');
    }
}
