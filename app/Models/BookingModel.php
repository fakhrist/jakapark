<?php
namespace App\Models;
use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $allowedFields = ['bookid','userid','vehicleid','spacerent','baris','kolom','datebook','startrent','endrent'];
}
