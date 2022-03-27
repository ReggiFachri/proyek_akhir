<?php

namespace App\Models;

use CodeIgniter\Model;

class CustModel extends Model
{
  protected $table      = 'customer';
  protected $primaryKey = 'idCustomer';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['Nama', 'NIK', 'Email', 'Pekerjaan', 'Password'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = false;

  public function getCustomer($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['idCustomer' => $id])->first();
  }
}
