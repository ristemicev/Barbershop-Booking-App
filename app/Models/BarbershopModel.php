<?php
namespace App\Models;
use CodeIgniter\Model;

class BarbershopModel extends Model{
    protected $table = 'barbershop';

    protected $allowedFields = [
        'name',
        'email',
        'address',
        'password',
    ];
}