<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhrPayrollsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $fillable = [
        'pid_payroll',
        'company_name',
        'station_name',
        'division_name',
        'username',
        'first_name',
        'last_name',
        'total_salary',
        'salary_date',
        'salary_period_start_date',
        'salary_period_end_date',
        'status1',
        'status2',
        'ext1',
        'ext2',
        'created_at',
        'updated_at'
    ];

    protected $table = 'webhr_payrolls';
}