<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilikRestoran extends Model
{
    protected $table = "PemilikRestoran";
    protected $allowedFields = [
        'username',
        'password',
        'restoranId',
    ];
    public function getDataPemilikRestoran()
    {
        return $this->findAll();
    }

    public function getUserByUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }
    public function validatePassword(string $username, string $password)
    {
        return $this->getUserByUsername($username)['password'] == md5($password);
    }
}
