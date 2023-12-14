<?php

namespace App\Models;

use CodeIgniter\Model;

class Restoran extends Model
{
    protected $table = "Restoran";
    protected $allowedFields = [
        'nama',
        'lokasiX',
        'lokasiY',
        'image',
    ];
    public function getDataRestoran($calorie)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Restoran');
        $builder->select('Restoran.id, Restoran.nama as namaRestoran, Restoran.lokasiX, Restoran.lokasiY ,Restoran.image, ROUND((sum(Makanan.kalori) / count(Makanan.id)),0) as totalKalori');
        $builder->join('Makanan', 'Restoran.id = Makanan.restoranId');
        $builder->groupBy('Restoran.id');
        if ($calorie !== null) {
            if ($calorie === "Low") {
                $builder->having('totalKalori < 500');
            } else if ($calorie === "Medium") {
                $builder->having('totalKalori >= 500 AND totalKalori <= 800');
            } else if ($calorie === "High") {
                $builder->having('totalKalori > 800');
            }
        }
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataRestoranbyId($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Restoran');
        $builder->select('Restoran.id, Restoran.nama as namaRestoran, Restoran.lokasiX, Restoran.lokasiY ,Restoran.image, ROUND((sum(Makanan.kalori) / count(Makanan.id)),0) as totalKalori');
        $builder->join('Makanan', 'Restoran.id = Makanan.restoranId');
        $builder->groupBy('Restoran.id');
        $builder->having('Restoran.id', (int)$id);
        $query = $builder->get();
        return $query->getResult();
    }
}
