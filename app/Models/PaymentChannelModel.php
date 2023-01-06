<?php
namespace App\Models;
use CodeIgniter\Model;

class PaymentChannelModel extends Model
{
    protected $table = 'payment_channel';
    protected $allowedFields = ['id','methodid','nama','accountno'];
}