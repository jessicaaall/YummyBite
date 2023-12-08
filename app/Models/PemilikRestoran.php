<?php
namespace App\Models;

use CodeIgniter\Model;

class PemilikRestoran extends Model {
    protected $table = "PemilikRestoran";
    protected $allowedFields = [
        'username',
        'password',
        'restoranId',
    ];
    public function getDataPemilikRestoran() {
        return $this->findAll();
    }
}