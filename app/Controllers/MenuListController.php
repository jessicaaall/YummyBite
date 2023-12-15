<?php

namespace App\Controllers;
use App\Models\Makanan;

class MenuListController extends BaseController
{
    public function menu()
    {
        $model = model(Makanan::class);
        $id =  session()->get('restoranId');
        $data['menu'] = $model->getDataMakananbyId($id);

        return view('menulist', $data);
    }

    public function insertMenu()
    {
        $namaMakanan = $this->request->getPost('namaMakanan');
        $kalori = $this->request->getPost('kalori');
        $harga = $this->request->getPost('harga');
        $waktuProses = $this->request->getPost('waktuProses');
        $restoranId = session()->get('restoranId');

        $db = \Config\Database::connect();

        $query = $db->table('Makanan')->selectMax('id')->get();
        $row = $query->getRow();
        $lastId = $row->id;

        $newId = $lastId + 1;

        $data = [
            'id' => $newId,
            'nama' => $namaMakanan,
            'kalori' => $kalori,
            'harga' => $harga,
            'waktuProses' => $waktuProses,
            'restoranId' => $restoranId
        ];

        $db->table('Makanan')->insert($data);
        $db->close();

        return redirect()->to('/menulist');
    }

    public function addMenu()
    {
        return view('addmenu');
    }

    public function deleteMenu($seg1)
    {        
        $menuId = $seg1;
                
        $db = \Config\Database::connect();

        $db->table('Makanan')->where('id', (int)$menuId)->delete();

       return redirect()->to('/menulist');
    }
}
