<?php
namespace App\Models;
use CodeIgniter\Model;

class BuildingModel extends Model
{
    protected $table = 'building';
    protected $allowedFields = ['spaceid','nama','prov','kab','kec','fulladdress'];
}