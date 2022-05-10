<?php

namespace App\Controllers;

class Pages extends BaseController {

    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home.php')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        if(session()->get('isLoggedIn') === null) {
            session()->set('isLoggedIn', FALSE);
        }
        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }

}