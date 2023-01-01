<?php
namespace App\Controllers;

//memanggil model
use App\Models\CarModel;

class Car extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->CarModel = new CarModel();
    }

    public function insert()
    {   
        return view('car_new');
    }

    public function insert_save()
    {
        $plat = $this->request->getVar('plat');
        $tipe = $this->request->getVar('tipe');
        $nama = $this->request->getVar('nama');
        $merk = $this->request->getVar('brand');
        $owns = 1;

        //insert data
        $this->CarModel->insert([
            'plate' => $plat,
            'type' => $tipe,
            'name' => $nama,
            'brand' => $merk,
            'owners' => $owns,
        ]);

        return redirect()->to('profile/');
    }

    public function update($id)
    {
        //Data Profile Pengguna (Filter by id)
        $car =  $this->CarModel->where('id', $id)->first();
        
        $output = [
            'car' => $car,
        ];

        return view('carlist_update', $output);
    }
    
    public function update_save($id)
    {
        $plat = $this->request->getVar('plat');
        $tipe = $this->request->getVar('tipe');
        $nama = $this->request->getVar('nama');
        $merk = $this->request->getVar('brand');

        //update data ke table
        $this->CarModel->update($id, [
            'plate' => $plat,
            'type' => $tipe,
            'name' => $nama,
            'brand' => $merk
        ]);

        return redirect()->to('profile/');
    }

    public function delete($id)
    {   
        //delete data table Profile filter by id
        $this->CarModel->delete($id);
        return redirect()->to('profile/');
    }

}