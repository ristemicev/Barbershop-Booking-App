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

    public function showEverything($id) {

        $query1 = 'select id, name, address, email from barbershop where id = ' . $id;
        $query2 = 'select * from bdecs where b_id = ' . $id;
        $query3 = 'select * from services where b_id = ' . $id;
        $query4 = 'select * from languages where b_id =' . $id;
        $query5 = 'select * from images where b_id = ' . $id;

        $barbershop['result1'] = $this->db->query($query1)->getResultArray();
        $barbershop['result2'] = $this->db->query($query2)->getResultArray();
        $barbershop['result3'] = $this->db->query($query3)->getResultArray();
        $barbershop['result4'] = $this->db->query($query4)->getResultArray();
        $barbershop['result5'] = $this->db->query($query5)->getResultArray();

        return $barbershop;
    }

}