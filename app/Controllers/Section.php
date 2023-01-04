<?php
namespace App\Controllers;

//memanggil model
use App\Models\SectionModel;
use App\Models\LevelModel;
use App\Models\BuildingModel;


class Section extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->SectionModel = new SectionModel();
        $this->LevelModel = new LevelModel();
        $this->BuildingModel = new BuildingModel();
    }

    public function home()
    {   
        return redirect()->to('building/level/1');
    }

    public function section_detail($id)
    {   
        //Data Profile Pengguna (Filter by id)
        $sections =  $this->SectionModel->where('levelcode', $id)->findAll();
        //$levels =  $this->LevelModel->where('levelid', $id)->findAll();
        //$building =  $this->BuildingModel->where('spaceid', $id)->first();

        $level = $this->LevelModel->select('levelid,buildcode,code,name')->where('levelid', $id)->first(); 
        $filter_building = $level['buildcode'];
        $building = $this->BuildingModel->select('spaceid,nama')->where('spaceid', $filter_building)->first(); 
        
        $output = [
            'section' => $sections,
            'level' => $level,
            'building' => $building
        ];

        return view('section_list', $output);
    }

    public function insert($id)
    {   
        $level = $this->LevelModel->select('levelid,buildcode,code,name')->where('levelid', $id)->first(); 
        $outputs = [
            'section' => $level,
        ];
        return view('section_new', $outputs);
    }

    public function insert_save()
    {
        $levl= $this->request->getVar('levelcode');
        $sect = $this->request->getVar('seccode');
        $name = $this->request->getVar('areaname');
        $rows = $this->request->getVar('totalrow');
        $capc = $this->request->getVar('capacity');

        //insert data
        $this->SectionModel->insert([
            'levelcode' => $levl,
            'code' => $sect,
            'name' => $name,
            'totalrow' => $rows,
            'spacerow' => $capc
        ]);

        return redirect()->to('building/section/'.$levl);

    }

    public function delete($id)
    {   
        $level = $this->SectionModel->select('levelcode')->where('secid', $id)->first();
        $this->SectionModel->where('secid', $id)->delete();
        return redirect()->to('building/section/'.$level['levelcode']);
    }
}