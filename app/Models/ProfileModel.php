<?php
namespace App\Models;
use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $allowedFields = ['id','nama','alamat','telp','email'];
}