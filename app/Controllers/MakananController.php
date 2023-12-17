<?php

namespace App\Controllers;

use App\Models\Makanan;
use App\Models\PemilikRestoran;
use CodeIgniter\RESTful\ResourceController;

class MakananController extends ResourceController
{
    public function index($seg1 = null)
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $modelPemilikRestoran = model(PemilikRestoran::class);


        if (!($modelPemilikRestoran->validatePassword($username, $password))) {
            $response = [
                'status' => 'error',
                'message' => 'Credential salah!'
            ];
            return $this->respond($response, 403);
        }
        $model = model(Makanan::class);
        $data = $model->getDataMakananbyId($seg1);
        return $this->respond($data, 200);
    }
}
