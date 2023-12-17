<?php

namespace App\Controllers;

use App\Models\Restoran;
use App\Models\PemilikRestoran;
use CodeIgniter\RESTful\ResourceController;

class RestoranController extends ResourceController
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
        $model = model(Restoran::class);
        $data = $model->getDataRestoran($seg1);

        return $this->respond($data, 200);
    }
    public function restoranbyId($seg1)
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
        $model = model(Restoran::class);
        $data = $model->getDataRestoranbyId($seg1);
        return $this->respond($data, 200);
    }
}
