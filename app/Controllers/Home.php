<?php

namespace App\Controllers;

use App\Models\BookingModel;

class Home extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->BookingModel = new BookingModel();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function dashboard()
    {
        $filterId = session()->get('profile_id');
        //Select Data Kendaraan (join car & profile)
        $booking = $this->BookingModel->select('*,gp.gedung, cd.plate, cd.name as mobil')
                ->join('gedung_parkir gp','spacerent = gp.secid', 'left')
                ->join('cardata cd','cd.id = vehicleid', 'left')
                ->where('userid', $filterId)
                ->orderBy('startrent','DESC')->first(); 

        $output = [
            'booking' => $booking
        ];

        return view('home', $output);
    }
}
