<?php
namespace App\Models;
use CodeIgniter\Model;

class ImagesModel extends Model
{
    protected $table = 'images';

    protected $allowedFields = [
        'name',
        'b_id',
        'ext',
    ];
}