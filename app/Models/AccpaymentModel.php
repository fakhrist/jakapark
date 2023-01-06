<?php
namespace App\Models;
use CodeIgniter\Model;

class AccpaymentModel extends Model
{
    protected $table = 'booking_payment';
    protected $allowedFields = ['bookid','total','metode','account','status'];
}