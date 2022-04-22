<?php

namespace App\Controllers;

use App\Models\UserModel;

class User_Auth extends BaseController
{

    public function loginpage()
    {

        $data['title'] = "Login";
        echo view('templates/header', $data);
        echo view('user_auth/login', $data);
        echo view('templates/footer', $data);

    }

    public function registerpage($data = null)
    {

        $data['title'] = "Register";
        echo view('templates/header', $data);
        echo view('user_auth/register', $data);
        echo view('templates/footer', $data);

    }

    public function register()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[50]',
            'surname' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'surname' => $this->request->getVar('surname'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return "ok";
        } else {
            $data['validation'] = $this->validator;
            return $data['validation']->listErrors();
        }

    }
}