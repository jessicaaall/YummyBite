<?php

namespace App\Controllers;

use App\Models\PemilikRestoran;

class AuthController extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()
                ->to('/');
        }
        helper(['form']);
        echo view('sign-in');
    }

    public function loginAuth()
    {
        $session = session();
        $pemilikRestoranModel = new PemilikRestoran();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));

        $data = $pemilikRestoranModel->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = $password === $pass;
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'restoranId' => $data['restoranId'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/menulist');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username does not exist.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
