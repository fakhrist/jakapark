<?php
namespace App\Controllers;

//memanggil model
use App\Models\SectionModel;
use App\Models\LevelModel;
use App\Models\BuildingModel;

class Building extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->SectionModel = new SectionModel();
        $this->LevelModel = new LevelModel();
        $this->BuildingModel = new BuildingModel();
    }

    public function detail()
    {   
        //Data Detail Lokasi Parkir
        $parkingdata = $this->BuildingModel->select('building.spaceid, building.nama, building.prov, building.kab, building.kec, building.fulladdress,COUNT(bl.buildcode) as totalLevel,
        SUM(COALESCE((SELECT SUM(COALESCE(bs.totalrow,0)*COALESCE(bs.spacerow,0)) as Totals FROM building_section bs WHERE bs.levelcode = bl.levelid GROUP BY bs.levelcode),0)) as totalParking')
        ->join('building_level bl','building.spaceid = bl.buildcode', 'left')->groupBy('building.spaceid')->orderBy('building.spaceid')->findAll();

        $output = [
            'building' => $parkingdata
        ];

        return view('building_list', $output);
    }

    public function insert()
    {   
        return view('building_new');
    }

    public function insert_save()
    {
        $nama = $this->request->getVar('nama');
        $prov = $this->request->getVar('prov');
        $kab = $this->request->getVar('kab');
        $kec = $this->request->getVar('kec');
        $alamat = $this->request->getVar('alamat');

        //insert data
        $this->BuildingModel->insert([
            'nama' => $nama,
            'prov' => $prov,
            'kab' => $kab,
            'kec' => $kec,
            'fulladdress' => $alamat,
        ]);

        $building = $this->BuildingModel->select('spaceid')->where('nama', $nama)->first(); 

        return redirect()->to('building/level/'.$building['spaceid']);
    }

    // public function update($id)
    // {
    //     //Data Profile Pengguna (Filter by id)
    //     $profil =  $this->BuildingModel->where('id', $id)->first();
        
    //     $output = [
    //         'profil' => $profil,
    //     ];

    //     return view('profile_update', $output);
    // }

    // public function update_save($id)
    // {
    //     $nama = $this->request->getVar('nama');
    //     $adrs = $this->request->getVar('alamat');
    //     $telp = $this->request->getVar('telp');
    //     $mail = $this->request->getVar('email');

    //     //update data ke table
    //     $this->BuildingModel->update($id, [
    //         'nama' => $nama,
    //         'alamat' => $adrs,
    //         'telp' => $telp,
    //         'email' => $mail
    //     ]);

    //     return redirect()->to('profile/');
    // }

    public function delete($id)
    {   
        $this->BuildingModel->where('spaceid', $id)->delete();
        return redirect()->to('building');
    }

}