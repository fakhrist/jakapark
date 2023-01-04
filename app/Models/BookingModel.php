<?php
namespace App\Models;
use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $allowedFields = ['bookid','userid','vechileid','spacerent','baris','kolom','datebook','startrent','endrent'];
}

//Create table view
//CREATE VIEW gedung_parkir AS
//SELECT bs.secid, bs.code, bs.name, bl.levelid as levelcode, bl.name as levelname, bd.spaceid as gedungcode, bd.nama as gedung, bd.prov, bd.kab, bd.kec, bd.fulladdress as alamat FROM building_section bs LEFT JOIN building_level bl ON bs.levelcode = bl.levelid LEFT JOIN building bd ON bl.buildcode = bd.spaceid;