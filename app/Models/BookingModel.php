<?php
namespace App\Models;
use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $allowedFields = ['bookid','userid','vehicleid','spacerent','baris','kolom','datebook','startrent','endrent'];
}

// Create table view gedung_parkir
// CREATE OR REPLACE VIEW gedung_parkir AS
// SELECT bs.secid, bs.code, bs.name, bl.levelid as levelcode, bl.name as levelname, bd.spaceid as gedungcode, bd.nama as gedung, bd.prov, bd.kab, bd.kec, bd.fulladdress as alamat, pr.ratepark FROM building_section bs LEFT JOIN building_level bl ON bs.levelcode = bl.levelid LEFT JOIN building bd ON bl.buildcode = bd.spaceid LEFT JOIN parking_rate pr ON bd.spaceid = pr.building;

// Create table view channel_service
// CREATE OR REPLACE VIEW channel_service AS
// SELECT pc.id, pc.methodid, pc.nama as nama_akun, pc.accountno, pm.nama as methodname, pm.keterangan FROM payment_channel pc LEFT JOIN payment_method pm ON pc.methodid = pm.id;