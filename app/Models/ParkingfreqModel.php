<?php
namespace App\Models;
use CodeIgniter\Model;

class ParkingfreqModel extends Model
{
    protected $table = 'park_freq';
    protected $allowedFields = ['userid','frekuensi','gedung'];
}
