<?php
namespace App\Models;
use CodeIgniter\Model;

class SectionModel extends Model
{
    protected $table = 'building_section';
    protected $allowedFields = ['secid','levelcode','code','name','totalrow','spacerow'];
}