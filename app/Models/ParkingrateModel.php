<?php
namespace App\Models;
use CodeIgniter\Model;

class ParkingrateModel extends Model
{
    protected $table = 'parking_rate';
    protected $allowedFields = ['id','building','ratepark'];
}
