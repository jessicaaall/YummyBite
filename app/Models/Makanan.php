<?php

namespace App\Models;

use CodeIgniter\Model;

class Makanan extends Model
{
    protected $table = "Makanan";
    protected $allowedFields = [
        'nama',
        'harga',
        'kalori',
        'waktuProses',
    ];
    public function getDataMakananbyId($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Makanan');
        $builder->select('Makanan.id, Makanan.nama as namaMakanan, Makanan.harga, Makanan.kalori ,Makanan.waktuProses');
        $builder->where('Makanan.restoranId', (int)$id);
        $query = $builder->get();
        return $query->getResult();
        // return $this->findAll();
    }

    public function getMakanan($id) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Makanan');
        $builder->select('Makanan.id, Makanan.nama, Makanan.kalori, Makanan.harga, Makanan.waktuProses');
        $builder->where('Makanan.id', (int)$id);
        $query = $builder->get();
        return $query->getResult();
    }
}
