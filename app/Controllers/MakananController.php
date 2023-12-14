<?php

namespace App\Controllers;

use App\Models\Makanan;
use CodeIgniter\RESTful\ResourceController;

class MakananController extends ResourceController
{
    public function index($seg1 = null)
    {

        $model = model(Makanan::class);
        $data = $model->getDataMakananbyId($seg1);
        return $this->respond($data, 200);
    }
}
