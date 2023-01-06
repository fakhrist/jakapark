<?php
namespace App\Controllers;

//memanggil model
use App\Models\PaymentmethodModel;
use App\Models\PaymentChannelModel;

class Payment extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->PaymentmethodModel = new PaymentmethodModel();
        $this->PaymentChannelModel = new PaymentChannelModel();
    }

    public function list()
    {   
        //Data Profile Pengguna (Filter by id)
        $metode =  $this->PaymentmethodModel->findAll();

        $output = [
            'metode' => $metode
        ];

        return view('payment_list', $output);
    }

    public function insert()
    {   
        return view('payment_insertmethod');
    }

    public function insert_save()
    {
        $nama = $this->request->getVar('nama');
        $ket = $this->request->getVar('keterangan');

        //insert data
        $this->PaymentmethodModel->insert([
            'nama' => $nama,
            'keterangan' => $ket
        ]);

        $filter = array('nama' => $nama, 'keterangan' => $ket);
        $accountchannel = $this->PaymentmethodModel->select('id')->where($filter)->first();
        return redirect()->to('payment/channel/'.$accountchannel['id']);
    }

    public function list_channel($id)
    {   
        //Data Profile Pengguna (Filter by id)
        $methode =  $this->PaymentmethodModel->where('id', $id)->first();
        $channel =  $this->PaymentChannelModel->where('methodid', $id)->findAll();

        $output = [
            'methode' => $methode,
            'channel' => $channel
        ];

        return view('channel_list', $output);
    }
    // public function delete($id)
    // {   
    //     $building = $this->LevelModel->select('buildcode')->where('levelid', $id)->first();
    //     $this->LevelModel->where('levelid', $id)->delete();
    //     return redirect()->to('building/level/'.$building['buildcode']);
    // }


    public function channel_add($id)
    {   
        $output = [
            'id' => $id,
        ];
        return view('channel_insert', $output);
    }

    public function insert_channel()
    {
        $metod = $this->request->getVar('method');
        $nama = $this->request->getVar('nama');
        $nacc = $this->request->getVar('nomoracc');

        //insert data
        $this->PaymentChannelModel->insert([
            'methodid' => $metod,
            'nama' => $nama,
            'accountno' => $nacc
        ]);

        return redirect()->to('payment/channel/'.$metod);
    }
}