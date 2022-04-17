<?php

namespace App\Controllers;

class User_Auth extends BaseController {

    public function loginpage() {

        $data['title'] = "Login";
        echo view('templates/header', $data);
        echo view('user_auth/login', $data);
        echo view('templates/footer', $data);

    }

    public function registerpage() {

        $data['title'] = "Register";
        echo view('templates/header', $data);
        echo view('user_auth/register', $data);
        echo view('templates/footer', $data);

    }

    public function register() {

    }
}