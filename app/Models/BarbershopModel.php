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

    public function getAll() {

        $query = 'select id, name, address, email from barbershop';
        $result = $this->db->query($query);

        return $result->getResultArray();

    }
}