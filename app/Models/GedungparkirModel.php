<?php
namespace App\Models;
use CodeIgniter\Model;

class GedungparkirModel extends Model
{
    protected $table = 'gedung_parkir';
    protected $allowedFields = ['secid','code','name','levelcode','levelname','gedungcode','gedung','prov','kab','kec','alamat'];
}