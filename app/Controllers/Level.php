<?php
namespace App\Controllers;

//memanggil model
use App\Models\LevelModel;
use App\Models\BuildingModel;

class Level extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->LevelModel = new LevelModel();
        $this->BuildingModel = new BuildingModel();
    }

    public function home()
    {   
        return redirect()->to('building/');
    }

    public function level_detail($id)
    {   
        //Data Profile Pengguna (Filter by id)
        $levels =  $this->LevelModel->where('buildcode', $id)->findAll();
        $building =  $this->BuildingModel->where('spaceid', $id)->first();

        $levels = $this->LevelModel->select('building_level.levelid , building_level.buildcode, building_level.code, building_level.name, 
        COALESCE(COUNT(bs.levelcode),0) as totalSection, COALESCE(SUM(bs.totalrow*bs.spacerow),0) as totalParking')
        ->join('building_section bs','building_level.levelid = bs.levelcode', 'left')
        ->where('building_level.buildcode', $id)->groupBy('building_level.levelid')->orderBy('building_level.levelid')->findAll();

        $output = [
            'level' => $levels,
            'building' => $building
        ];

        return view('level_list', $output);
    }

    public function insert($id)
    {   
        $output = [
            'building' => $id,
        ];
        return view('level_new', $output);
    }

    public function insert_save()
    {
        $buld = $this->request->getVar('buildcode');
        $code = $this->request->getVar('levelcode');
        $name = $this->request->getVar('levelname');

        //insert data
        $this->LevelModel->insert([
            'buildcode' => $buld,
            'code' => $code,
            'name' => $name
        ]);

        $filter = array('buildcode' => $buld, 'code' => $code);
        $level = $this->LevelModel->select('levelid')->where($filter)->first();
        return redirect()->to('building/section/'.$level['levelid']);
        //return redirect()->to('/building/level/'.$buld);
    }

    public function delete($id)
    {   
        $building = $this->LevelModel->select('buildcode')->where('levelid', $id)->first();
        $this->LevelModel->where('levelid', $id)->delete();
        return redirect()->to('building/level/'.$building['buildcode']);
    }
}