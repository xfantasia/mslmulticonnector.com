<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyWebhrPayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webhr_payrolls', function (Blueprint $table) {
            // $table->dropIndex('webhr_payrolls_pid_payroll_unique');
            $table->dropColumn(['pid_payroll','company_name','station_name','division_name','username','first_name','last_name','total_salary','salary_date','salary_period_start_date','salary_period_end_date']);
            $table->json('payroll')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webhr_payrolls', function (Blueprint $table) {
            $table->dropColumn('payroll');
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
        });
    }
}
