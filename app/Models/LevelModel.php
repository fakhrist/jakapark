<?php
namespace App\Models;
use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table = 'building_level';
    protected $allowedFields = ['levelid','buildcode','code','name'];
}