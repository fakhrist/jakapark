<?php
namespace App\Models;
use CodeIgniter\Model;

class ChannelServiceModel extends Model
{
    protected $table = 'channel_service';
    protected $allowedFields = ['id','methodid','nama_akun','accountno','methodname','keterangan'];
}