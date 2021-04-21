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
            $table->string('pid_payroll')->after('id');
            $table->string('company_name')->after('pid_payroll');
            $table->string('station_name')->after('company_name');
            $table->string('division_name')->after('station_name');
            $table->string('username')->after('division_name');
            $table->string('first_name')->after('username');
            $table->string('last_name')->after('first_name');
            $table->string('total_salary')->after('last_name');
            $table->string('salary_date')->after('total_salary');
            $table->string('salary_period_start_date')->after('salary_date');
            $table->string('salary_period_end_date')->after('salary_period_start_date');
        });
    }
}
