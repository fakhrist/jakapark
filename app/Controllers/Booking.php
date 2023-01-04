<?php
namespace App\Controllers;

//memanggil model
use App\Models\BookingModel;
use App\Models\SectionModel;
use App\Models\LevelModel;
use App\Models\BuildingModel;
use App\Models\ProfileModel;
use App\Models\CarModel;
use App\Models\GedungparkirModel;

class Booking extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->BookingModel = new BookingModel();
        $this->SectionModel = new SectionModel();
        $this->LevelModel = new LevelModel();
        $this->BuildingModel = new BuildingModel();
        $this->ProfileModel = new ProfileModel();
        $this->CarModel = new CarModel();
        $this->GedungparkirModel = new GedungparkirModel();
    }

    public function detail()
    {   
        $filterId = 1;
        //Select Data Kendaraan (join car & profile)
        $booking = $this->BookingModel->select('*,gp.gedung')->join('gedung_parkir gp','spacerent = gp.secid')->
                where('userid', $filterId)->orderBy('startrent')->findAll(); 
        
        $output = [
            'booking' => $booking
        ];

        return view('parking_list', $output);
    }

    public function insert()
    {   
        $filterId = 1;
        //Select Data Kendaraan (join car & profile)
        $mobil = $this->CarModel->select('cardata.id as idCar, plate, type, name, brand')->join('profile pr','owners = pr.id')->
                where('owners', $filterId)->orderBy('plate')->findAll(); 
        
        //API dari Raja Ongkir
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 9ee37f9591a16336d364e9f0f3bf539c"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $dataprov['province'] = json_decode($response);
        }

        $output = [
            'cars' => $mobil,
            'provinsi' => $dataprov,
        ];

        return view('parking_book', $output);
    }

}