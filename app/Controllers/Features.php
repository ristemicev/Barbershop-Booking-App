<?php

namespace App\Controllers;

use App\Models\BarbershopModel;

class Features extends BaseController
{

    public function index()
    {
        $data['title'] = 'Barbershops';
        echo view('templates/header', $data);
        echo view('features/barbershops', $data);
        echo view('templates/footer', $data);
    }


}