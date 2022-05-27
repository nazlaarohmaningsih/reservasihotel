<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        return view('admin/login');
    }
    
    public function login()
    {
       // menampung username dan password 
        $usernya        = $this->request->getPost('txtUser');
        $passwordnya    = md5($this->request->getPost('txtPass'));

        //array untuk menentukan syarat siapa yang login
        $syarat=[
            'username'=>$usernya,
            'password'=>$passwordnya
        ];

        // mencari user berdasarkan syarat di atas
        $queryUser  = $this->user->where($syarat)->find();

        //SQL = select * from tbluser where username = ? andn password =?

        //membuktikan apakah user ada atau tidak 
        // var_dump($queryUser);
       
        if(count($queryUser)==1){
            // membuat session
            $dataSession=[
                'user'  =>$queryUser[0]['username'],
                'nama'  =>$queryUser[0]['namauser'],
                'level' =>$queryUser[0]['leveluser'],
                'sudahkahLogin'=>true
            ];
            session()->set($dataSession);

            // jika sukses login arahkan ke dashboard 
            return redirect()->to(site_url('/dashboard'));
        } else{
            //mengembalikan ke halaman login
            return redirect()->to(site_url('/login'))->with('info','<div style="color:red;font-size:16px;font-weight-normal">Gagal Login</div>');
        }
    }

    public function logout(){
        // 1. menghapus session
        session()->destroy();
        // 2. mengarahkan ke halaman login
        return redirect()->to(site_url('/login'));
    }
}


