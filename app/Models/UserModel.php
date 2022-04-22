<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'user';

    protected $allowedFields = [
        'name',
        'surname',
        'email',
        'password',
    ];
}