<?php

namespace App\Controllers;

use App\Models\BarbershopModel;
use App\Models\DescriptionModel;
use App\Models\LanguagesModel;
use App\Models\ServicesModel;
use App\Models\ImagesModel;

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

    public function display($data) {
        $data['title'] = 'Barbershops';
        echo view('templates/header', $data);
        echo view('features/barbershops', ['data' => $data]);
        echo view('templates/footer',$data);
    }

    public function afterLogin()
    {
        if (session()->get('type') === 'b') {
            return redirect()->to('http://localhost:8080/profile');
        } else {
            return redirect()->to('http://localhost:8080/barbershops');
        }
    }

    public function showProfile()
    {

        $data['title'] = "Profile";
        $data['ses_data'] = session()->get();
        $id = $data['ses_data']['id'];
        $barbershopModel = new BarbershopModel();
        $data['barbershop'] = $barbershopModel->showEverything($id);
        echo view('templates/header', $data);
        echo view('features/profile', $data);
        echo view('templates/footer', $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function insert()
    {
        $type = $this->request->getVar('type');

        if ($type === "serv") {

            $rules = [
                'name' => 'required',
                'duration' => 'required',
                'price' => 'required',
            ];

            if ($this->validate($rules)) {
                $servicesModel = new ServicesModel();

                $data = [
                    'name' => $this->request->getVar('name'),
                    'duration' => $this->request->getVar('duration'),
                    'price' => $this->request->getVar('price'),
                    'b_id' => session()->get('id'),
                ];

                $servicesModel->save($data);
                return "ok";
            } else {
                $data['validation'] = $this->validator;
                return $data['validation']->listErrors();
            }
        }
        elseif ($type === "desc") {
            $rules = [
                'description' => 'required',
            ];

            if ($this->validate($rules)) {
                $descModel = new DescriptionModel();

                $count = $descModel->where("b_id", session()->get('id'))->countAllResults();

                if ($count == 1) {

                    $desc = $this->request->getVar("description");

                    $descModel->where("b_id", session()->get('id'))->set("description", $desc)->update();

                } else {
                    $data = [
                        'description' => $this->request->getVar('description'),
                        'b_id' => session()->get('id'),
                    ];

                    $descModel->save($data);
                }
                return "ok";
            } else {
                $data['validation'] = $this->validator;
                return $data['validation']->listErrors();
            }

        }
        elseif ($type === "lang") {

            $rules = [
                'language' => 'required',
            ];

            if ($this->validate($rules)) {
                $langModel = new LanguagesModel();

                $data = [
                    'language' => $this->request->getVar('language'),
                    'b_id' => session()->get('id'),
                ];

                $langModel->save($data);

                return "ok";
            } else {
                $data['validation'] = $this->validator;
                return $data['validation']->listErrors();
            }
        }
        elseif ($type === "addr") {

            $rules = [
                'address' => 'required',
            ];

            if ($this->validate($rules)) {
                $barbershopModel = new BarbershopModel();

                $addr = $this->request->getVar("address");

                $barbershopModel->where("email", session()->get('email'))->set("address", $addr)->update();
                return "ok";
            } else {
                $data['validation'] = $this->validator;
                return $data['validation']->listErrors();
            }
        } else {
            echo "error";
        }
    }

    public
    function delete()
    {

        $type = $this->request->getVar('type');
        $id = $this->request->getVar('id');

        if ($type === "service") {

            $servModel = new ServicesModel();

            $servModel->where("id", $id)->delete();
        } elseif ($type === "language") {

            $langModel = new LanguagesModel();

            $langModel->where("id", $id)->delete();
        } elseif ($type === "image") {

            $imageModel = new ImagesModel();

            $name = $imageModel->where("id", $id)->first()['name'];

            unlink('uploads/' . $name);

            $imageModel->where("id", $id)->delete();
        } else {
            echo "error";
        }

        echo "ok";
    }

    public
    function edit()
    {

        $type = $this->request->getVar('type');
        $id = $this->request->getVar('id');

        if ($type === "language") {

            $langModel = new LanguagesModel();

            $language = $this->request->getVar('language');
            $langModel->where("id", $id)->set('language', $language)->update();

            echo "ok";
        } elseif ($type === "service") {

            $serviceModel = new ServicesModel();

            $data = [
                'name' => $this->request->getVar('name'),
                'duration' => $this->request->getVar('duration'),
                'price' => $this->request->getVar('price'),
                'b_id' => session()->get('id'),
            ];

            $serviceModel->where('id', $id)->set($data)->update();

            echo "ok";
        }
    }

    /**
     * @throws \ReflectionException
     */
    public
    function store()
    {
        helper(['form', 'url']);

        $db = \Config\Database::connect();
        $builder = $db->table('images');

        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);

        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Image has not been uploaded successfully"
        ];

        if ($validated) {
            $avatar = $this->request->getFile('file');
            $fileName = $avatar->getRandomName();
            $avatar->move('uploads', $fileName);

            $data = [
                'name' => $avatar->getName(),
                'b_id' => session()->get('id'),
            ];

            $save = $builder->insert($data);
            $response = [
                'success' => true,
                'data' => $save,
                'msg' => "Image has been uploaded successfully"
            ];
        }

        return $this->response->setJSON($response);

    }

    public function displaySpecific($id)
    {
        $barbershopModel = new BarbershopModel();
        $data['barbershop'] = $barbershopModel->showEverything($id);
        $data['title'] = $data['barbershop']['result1'][0]['name'];
        echo view('templates/header', $data);
        echo view('features/specific', $data);
        echo view('templates/footer', $data);
    }

    public function search () {

        $barbershopModel = new BarbershopModel();

        $text = $this->request->getVar('text');

        $data['barbershops'] = $barbershopModel->search($text);

        $response = $this->display($data);

        echo $response;
    }
}