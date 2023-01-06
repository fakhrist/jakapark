<?php
namespace App\Controllers;

//memanggil model
use App\Models\SectionModel;
use App\Models\LevelModel;
use App\Models\BuildingModel;
use App\Models\ParkingrateModel;

class Building extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->SectionModel = new SectionModel();
        $this->LevelModel = new LevelModel();
        $this->BuildingModel = new BuildingModel();
        $this->ParkingrateModel = new ParkingrateModel();
    }

    public function detail()
    {   
        //Data Detail Lokasi Parkir
        $parkingdata = $this->BuildingModel->select('building.spaceid, building.nama, building.prov, building.kab, building.kec, building.fulladdress,COUNT(bl.buildcode) as totalLevel,
        SUM(COALESCE((SELECT SUM(COALESCE(bs.totalrow,0)*COALESCE(bs.spacerow,0)) as Totals FROM building_section bs WHERE bs.levelcode = bl.levelid GROUP BY bs.levelcode),0)) as totalParking,
        COALESCE(pr.ratepark,0) as rate')
        ->join('building_level bl','building.spaceid = bl.buildcode', 'left')
        ->join('parking_rate pr','building.spaceid = pr.building', 'left')
        ->groupBy('building.spaceid')->orderBy('building.spaceid')->findAll();

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

    public function delete($id)
    {   
        $this->BuildingModel->where('spaceid', $id)->delete();
        return redirect()->to('building');
    }

    public function rate_insert($id)
    {
        $output = [
            'id' => $id,
        ];

        return view('parkingrate_save', $output);
    }

    public function rate_insertsave()
    {
        $bldg = $this->request->getVar('building');
        $rate = $this->request->getVar('rate');

        //insert data
        $this->ParkingrateModel->insert([
            'building' => $bldg,
            'ratepark' => $rate
        ]);

        return redirect()->to('building');
    }

    public function rate_update($id)
    {
        $parkrate =  $this->ParkingrateModel->where('building', $id)->first();
        
        $output = [
            'rate' => $parkrate,
        ];

        return view('parkingrate_update', $output);
    }

    public function rate_save()
    {
        $idpr = $this->request->getVar('id');
        $rate = $this->request->getVar('rate');

        //update data ke table
        $this->ParkingrateModel->update($idpr, [
            'ratepark' => $rate,
        ]);

        return redirect()->to('building');
    }
}