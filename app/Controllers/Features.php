<?php

namespace App\Controllers;

use App\Models\BarbershopModel;

class Features extends BaseController
{

    public function index()
    {
        $barbershopModel = new BarbershopModel();
        $data['barbershops'] = $barbershopModel->getAll();

        $data['title'] = 'Barbershops';
        echo view('templates/header', $data);
        echo view('features/barbershops', $data);
        echo view('templates/footer', $data);
    }


}