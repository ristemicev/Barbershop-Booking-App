<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $table = 'services';

    protected $allowedFields = [
        'name',
        'duration',
        'price',
        'b_id',
    ];

    public function getInfo($id) {

        $query = "select price, duration from services where id = '" . $id . "'";

        return $this->db->query($query)->getRowArray();

    }
}