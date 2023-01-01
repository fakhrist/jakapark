<?php
namespace App\Models;
use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table = 'cardata';
    protected $allowedFields = ['id','plate','type','name','brand','owners'];
}