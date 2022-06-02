<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';

    protected $allowedFields = [
        'b_id',
        'u_id',
        'date',
        'time',
        's_id'
    ];
}