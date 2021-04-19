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
        'payroll',
        'status1',
        'status2',
        'ext1',
        'ext2',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'payroll' => 'array',
    ];

    protected $table = 'webhr_payrolls';
}
