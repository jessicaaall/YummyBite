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

    public function editMenu($seg1)
    {
        $model = model(Makanan::class);
        $data['makanan'] = $model->getMakanan($seg1);
        $data['menuId'] = $seg1;

        return view('editmenu', $data);
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
        $db->close();

       return redirect()->to('/menulist');
    }

    public function updateMenu($seg1)
    {
        $namaMakanan = $this->request->getPost('namaMakanan');
        $kalori = $this->request->getPost('kalori');
        $harga = $this->request->getPost('harga');
        $waktuProses = $this->request->getPost('waktuProses');

        $db = \Config\Database::connect();
    
        $data = [
            'nama' => $namaMakanan,
            'kalori' => $kalori,
            'harga' => $harga,
            'waktuProses' => $waktuProses,
        ];
    
        $db->table('Makanan')->where('id', (int)$seg1)->update($data);
        $db->close();
    
        return redirect()->to('/menulist');
    }

}
