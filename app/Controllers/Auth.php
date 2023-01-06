<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfileModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ProfileModel = new ProfileModel();
    }

    public function login()
    {
        return view('login');
    }

    public function login_submit()
    {
        //ambil data dari form login
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        //aturan validasi
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[5]',
        ];

        //jika validasi gagal
        if (!$this->validate($rules)) {
            return redirect()->back()->with('validation', $this->validator);

        //jika validasi sukses
        } else {

            //check username & password enkripsi terdaftar di database
            $encrypt_password = sha1($password);
            $filter = "password='$encrypt_password' AND tipe IS NOT NULL";
            // $filter = array('password' => $encrypt_password, 'tipe >' => 0);
            $data = $this->UserModel->select('id, username, tipe, profile_id')->where($filter)->first();
            $filterProfile = $data['profile_id'];
            $profil = $this->ProfileModel->where('id', $filterProfile)->first();

            if ($data) {
                //membuat session
                session()->set([
                    'username' => $profil['nama'],
                    'tipe' => $data['tipe'],
                    'profile_id' => $data['profile_id'],
                    'is_login' => TRUE
                ]);

                return redirect()->to('home');
                

            } else {
                return redirect()->route('login')->with('error', 'Invalid login');
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }

    public function register()
    {
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $telpon = $this->request->getVar('telpon');
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $pass_enc = sha1($password);
        //insert data
        $this->ProfileModel->insert([
            'nama' => $nama,
            'alamat' => $alamat,
            'telp' => $telpon,
            'email' => $email
        ]);

        $filter = array('nama' => $nama, 'telp' => $telpon);
        $level = $this->ProfileModel->select('id')->where($filter)->first();

        $idProfile =  $level['id'];

        $this->UserModel->insert([
            'username' => $username,
            'password' => $pass_enc,
            'profile_id' => $idProfile
        ]);

        return redirect()->to('login/waiting');
    }

    public function login_after_reg()
    {
        return redirect()->route('login')->with('inforeg', 'moderas');
    }
}