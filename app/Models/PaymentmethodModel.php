<?php
namespace App\Models;
use CodeIgniter\Model;

class PaymentmethodModel extends Model
{
    protected $table = 'payment_method';
    protected $allowedFields = ['id','nama','keterangan'];
}