<?php
namespace App\Controllers;

//memanggil model
use App\Models\ProfileModel;
use App\Models\CarModel;

class Profile extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->ProfileModel = new ProfileModel();
        $this->CarModel = new CarModel();
    }

    public function detail()
    {   
        $filterId = session()->get('profile_id');
        //Data Profile Pengguna (Filter by id)
        $profil =  $this->ProfileModel->where('id', $filterId)->first();
        //Select Data Kendaraan (join car & profile)
        $mobil = $this->CarModel->select('cardata.id as idCar, plate, type, name, brand')->join('profile pr','owners = pr.id')->
                where('owners', $filterId)->orderBy('plate')->findAll(); 
        
        $output = [
            'profil' => $profil,
            'cars' => $mobil,
        ];

        return view('profile_list', $output);
    }

    public function update($id)
    {
        //Data Profile Pengguna (Filter by id)
        $profil =  $this->ProfileModel->where('id', $id)->first();
        
        $output = [
            'profil' => $profil,
        ];

        return view('profile_update', $output);
    }

    public function update_save($id)
    {
        $nama = $this->request->getVar('nama');
        $adrs = $this->request->getVar('alamat');
        $telp = $this->request->getVar('telp');
        $mail = $this->request->getVar('email');

        //update data ke table
        $this->ProfileModel->update($id, [
            'nama' => $nama,
            'alamat' => $adrs,
            'telp' => $telp,
            'email' => $mail
        ]);

        return redirect()->to('profile/');
    }

}