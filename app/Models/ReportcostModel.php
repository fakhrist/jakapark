<?php
namespace App\Models;
use CodeIgniter\Model;

class ReportcostModel extends Model
{
    protected $table = 'report_cost';
    protected $allowedFields = ['userid','tanggal','biaya'];
}
