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

    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
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
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('templates/header', $data);
        $this->load->view('user_authentication/login_form', $data);
        $this->load->view('templates/footer');
    }


    public function dashboard() {

        $data['title'] = "Profile";
        echo view('templates/header', $data);
        echo view('user_auth/profile', $data);
        echo view('templates/footer', $data);
    }
}