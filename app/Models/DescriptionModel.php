<?php
namespace App\Models;
use CodeIgniter\Model;

class DescriptionModel extends Model
{
    protected $table = 'bdecs';

    protected $allowedFields = [
        'description',
        'b_id',
    ];
}