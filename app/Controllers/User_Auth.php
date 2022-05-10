<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BarbershopModel;

class User_Auth extends BaseController
{

    public function loginpage()
    {
        if(session()->get('isLoggedIn') === null) {
            session()->set('isLoggedIn', FALSE);
        }
        $data['title'] = "Login";
        echo view('templates/header', $data);
        echo view('user_auth/login', $data);
        echo view('templates/footer', $data);

    }

    public function registerpage($data = null)
    {
        if(session()->get('isLoggedIn') === null) {
            session()->set('isLoggedIn', FALSE);
        }

        $data['title'] = "Register";
        echo view('templates/header', $data);
        echo view('user_auth/register', $data);
        echo view('templates/footer', $data);

    }

    public function register()
    {
        $type = $this->request->getVar('flexRadioDefault1');
        if ($type === "user") {
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
        } else {
            $rules = [
                'name' => 'required|min_length[2]|max_length[50]',
                'address' => 'required|min_length[4]|max_length[100]',
                'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email]',
                'password' => 'required|min_length[4]|max_length[50]',
                'confirmpassword' => 'matches[password]'
            ];

            if ($this->validate($rules)) {
                $barbershopModel = new BarbershopModel();
                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'address' => $this->request->getVar('address'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ];
                $barbershopModel->save($data);
                return "ok";
            } else {
                $data['validation'] = $this->validator;
                return $data['validation']->listErrors();
            }
        }

    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        $barbershopModel = new BarbershopModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();
        $data2 = $barbershopModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE,
                    'type' => 'u',
                ];
                $session->set($ses_data);
                return "ok";
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return "Password is incorrect.";
            }
        } elseif ($data2) {
            $pass = $data2['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data2['id'],
                    'name' => $data2['name'],
                    'address' => $data2['address'],
                    'email' => $data2['email'],
                    'isLoggedIn' => TRUE,
                    'type' => 'b',
                ];
                $session->set($ses_data);
                return "ok";
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return "Password is incorrect.";
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return "Email does not exist.";
        }

    }

    public function logout()
    {
        $ses_data = [
            'id' => '',
            'name' => '',
            'surname' => '',
            'email' => '',
            'isLoggedIn' => FALSE,
            'type' => '',
        ];
        session()->set($ses_data);
        echo 'Successfully Logout';
    }


    public function dashboard()
    {
        $data['title'] = "Profile";
        $data['ses_data'] = session()->get();
        echo view('templates/header', $data);
        echo view('user_auth/profile', $data);
        echo view('templates/footer', $data);
    }
}