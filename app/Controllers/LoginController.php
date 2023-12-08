<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\PemilikRestoran;

class LoginController extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn'))
        {
            return redirect()
                ->to('/');
        }
        helper(['form']);
        echo view('sign-in');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $customerModel = new PemilikRestoran();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        
        $data = $customerModel->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = $password === $pass;
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }
}