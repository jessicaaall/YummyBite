<?php

namespace App\Controllers;

use App\Models\Restoran;
use CodeIgniter\RESTful\ResourceController;

class RestoranController extends ResourceController
{
    public function index($seg1 = null)
    {

        $model = model(Restoran::class);
        $data = $model->getDataRestoran($seg1);

        return $this->respond($data, 200);
    }
    public function restoranbyId($seg1)
    {

        $model = model(Restoran::class);
        $data = $model->getDataRestoranbyId($seg1);
        return $this->respond($data, 200);
    }
}
