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
use App\Models\ParkingrateModel;
use App\Models\ChannelServiceModel;
use App\Models\AccpaymentModel;

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
        $this->ParkingrateModel = new ParkingrateModel();
        $this->ChannelServiceModel = new ChannelServiceModel();
        $this->AccpaymentModel = new AccpaymentModel();
    }

    public function detail()
    {   
        $filterId = 1;
        //Select Data Kendaraan (join car & profile)
        $booking = $this->BookingModel->select('*,gp.gedung, cd.plate, cd.name as mobil')
                ->join('gedung_parkir gp','spacerent = gp.secid', 'left')
                ->join('cardata cd','cd.id = vehicleid', 'left')
                ->where('userid', $filterId)->orderBy('startrent')->findAll(); 

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

    public function searchcity($id)
    {   
        // $searchId = $this->request->getVar('idSearch');
        $searchId = $id;
        
        //API dari Raja Ongkir
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$searchId,
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
        
        return $response;
    }

    public function searchbuilding()
    {   
      $kotaFilter = $this->request->getVar('searching');

      $query   = $this->GedungparkirModel->query("SELECT DISTINCT(gedung) as gedung, gedungcode FROM gedung_parkir WHERE kab = '$kotaFilter'");
      $results = $query->getResult();
      $data ='<option value="">Pilih Salah Satu</option>';
      foreach ($results as $row) 
      {
              $gdg_name = $row->gedung;
              $gdg_code = $row->gedungcode;
              $data .= "<option value='$gdg_code'>$gdg_name</option>";
      }  
      return $data;    
    }

    public function searchlevel()
    {   
      $levelFilter = $this->request->getVar('searching');

      $query   = $this->GedungparkirModel->query("SELECT DISTINCT(levelname) as levelname, levelcode FROM gedung_parkir WHERE gedung = '$levelFilter'");
      $results = $query->getResult();
      $data ='<option value="">Pilih Salah Satu</option>';
      foreach ($results as $row) 
      {
              $lvl_name = $row->levelname;
              $lvl_code = $row->levelcode;
              $data .= "<option value='$lvl_code'>$lvl_name</option>";
      }  

      return $data;    
    }

    public function searcharea()
    {   
      $areaFilter = $this->request->getVar('searching');

      $query   = $this->GedungparkirModel->query("SELECT DISTINCT(name) as areaname, secid FROM gedung_parkir WHERE levelname = '$areaFilter'");
      $results = $query->getResult();
      $data ='<option value="">Pilih Salah Satu</option>';
      foreach ($results as $row) 
      {
              $area_name = $row->areaname;
              $area_code = $row->secid;
              $data .= "<option value='$area_code'>$area_name</option>";
      }  

      return $data;    
    }

    public function searchspace()
    {   
      $spaceFilter = $this->request->getVar('searching');

      //Baris
      $query   = $this->GedungparkirModel->query("SELECT totalrow, spacerow FROM building_section bs WHERE bs.name = '$spaceFilter'");
      $results = $query->getResult();

      $baris ='<option value="">Pilih Salah Satu</option>';
      foreach ($results as $row) 
      {
              $totalRow = $row->totalrow;
              for ($i = 1; $i <= $totalRow; $i++) {
                $baris .= "<option value='$i'>$i</option>";
              }
      }  

      //Kolom
      $kolom ='<option value="">Pilih Salah Satu</option>';
      foreach ($results as $row) 
      {
              $totalCol = $row->spacerow;
              for ($i = 1; $i <= $totalCol; $i++) {
                $kolom .= "<option value='$i'>$i</option>";
              }
      }  

      $data = json_encode(array($baris, $kolom));

      return $data;    
    }

    public function insert_save()
    {
        $owns = 1;
        $cars = $this->request->getVar('vehicle');
        $area = $this->request->getVar('area');
        $rows = $this->request->getVar('baris');
        $cols = $this->request->getVar('kolom');
        $stpk = $this->request->getVar('startpark');
        $enpk = $this->request->getVar('endpark');

        $bookid = trim($cars).'-'.$owns.'-'.$area.trim(str_replace(array("-",":","T"),array("","","") ,$stpk));

        //insert data
        $this->BookingModel->insert([
            'bookid' => $bookid,
            'userid' => $owns,
            'vechileid' => $cars,
            'spacerent' => $area,
            'baris' => $rows,
            'kolom' => $cols,
            'startrent' => $stpk,
            'endrent' => $enpk,
        ]);

        return redirect()->to('parking/review/'.$bookid);
    }

    public function review($id)
    {   
        $booking =  $this->BookingModel->where('bookid', $id)->first();
        //Select Data Kendaraan (join car & profile)
        $buildingFilter = $booking['spacerent'];
        $parkir = $this->GedungparkirModel->where('secid', $buildingFilter)->first(); 
        
        $output = [
            'booking' => $booking,
            'parkir' => $parkir,
        ];

        return view('parking_review', $output);                
    }

    public function payment($id)
    {   
        $booking =  $this->BookingModel->where('bookid', $id)->first();
        //Select Data Kendaraan (join car & profile)
        $buildingFilter = $booking['spacerent'];
        $parkir = $this->GedungparkirModel->where('secid', $buildingFilter)->first(); 
        // $cost = $this->ParkingrateModel->where('building', 1)->first(); 
        $channel = $this->ChannelServiceModel->select('DISTINCT(methodid) as methodid, methodname')->orderBy('id')->findAll(); 

        $output = [
            'booking' => $booking,
            'parkir' => $parkir,
            'payment' => $channel,
        ];

        return view('parking_payment', $output);                
    }

    public function insert_payment()
    {
        $bcode = $this->request->getVar('bookingcode');
        $costs = $this->request->getVar('biaya');
        $metod = $this->request->getVar('metode');
        $chnnl = $this->request->getVar('channel');

        //insert data
        $this->AccpaymentModel->insert([
            'bookid' => $bcode,
            'total' => $costs,
            'metode' => $metod,
            'account' => $chnnl,
        ]);

        return redirect()->to('parking/confirmation/'.$bcode);
    }

    public function searchservice()
    {   
      $idFilter = $this->request->getVar('searching');
 
      $query   = $this->ChannelServiceModel->query("SELECT DISTINCT(id) as payid, nama_akun as akun FROM channel_service WHERE methodid = '$idFilter'");
      $results = $query->getResult();
      $data ='<option value="">Pilih Salah Satu</option>';
      foreach ($results as $row) 
      {
              $payid = $row->payid;
              $akun = $row->akun;
              $data .= "<option value='$payid'>$akun</option>";
      } 

      return $data; 
    }    

    public function confirmation($id)
    {   
        $booking =  $this->BookingModel->where('bookid', $id)->first();
        //Select Data Kendaraan (join car & profile)
        $buildingFilter = $booking['spacerent'];
        $parkir = $this->GedungparkirModel->where('secid', $buildingFilter)->first(); 
        
        $output = [
            'booking' => $booking,
            'parkir' => $parkir,
        ];

        return view('parking_confirmation', $output);                
    }

    public function paid()
    {
        $book = $this->request->getVar('booking');
        $paid = $this->request->getVar('bayar');

        $query   = $this->AccpaymentModel->query("UPDATE booking_payment bp SET bp.status = 1 WHERE bookid = '$book'"); 

        return redirect()->to('parking');
    }
}