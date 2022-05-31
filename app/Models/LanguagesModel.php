<?php
namespace App\Models;
use CodeIgniter\Model;

class LanguagesModel extends Model
{
    protected $table = 'languages';

    protected $allowedFields = [
        'language',
        'b_id',
    ];
}