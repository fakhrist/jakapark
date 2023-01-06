<?php
namespace App\Controllers;

//memanggil model
use App\Models\ProfileModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->ProfileModel = new ProfileModel();
        $this->UserModel = new UserModel();
    }

    public function detail()
    {   
        $profil = $this->UserModel->select('pr.nama as nama, pr.email, username, tipe, user.id as identitas')
                ->join('profile pr','profile_id = pr.id')
                ->orderBy('user.id')->findAll(); 
        
        $output = [
            'profil' => $profil,
        ];

        return view('user_list', $output);
    }

    public function update($id)
    {
        $profil = $this->UserModel->select('pr.nama as nama, pr.email, username, tipe, user.id as identitas')
                ->join('profile pr','profile_id = pr.id')
                ->where('user.id',$id)->first(); 
        
        $output = [
            'profil' => $profil,
        ];

        return view('user_update', $output);
    }

    public function update_save()
    {
        $idn = $this->request->getVar('id');
        $lvl = $this->request->getVar('level');

        //update data ke table
        $this->UserModel->update($idn, [
            'tipe' => $lvl,
        ]);

        return redirect()->to('user');
    }

    public function delete($id)
    {   
        $idx = $this->UserModel->select('profile_id')->where('id', $id)->first();
        $del = $idx['profile_id'];
        $this->ProfileModel->where('id', $del)->delete();
        $this->UserModel->where('id', $id)->delete();
        return redirect()->to('user');
    }

}