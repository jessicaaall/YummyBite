<?php
namespace App\Controllers;

use App\Models\PemilikRestoran;
use CodeIgniter\RESTful\ResourceController;

class PemilikRestoranController extends ResourceController
{
    public function index()
    {
        $model = model(PemilikRestoran::class);
        $data = $model->getDataPemilikRestoran();
        return $this->respond($data, 200);

    }
}