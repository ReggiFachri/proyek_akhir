<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
  protected $table      = 'petugas_apt';
  protected $primaryKey = 'idPetugas';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['NIP', 'Nama', 'Email', 'Unit', 'idLevel', 'Password'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = false;

  public function getPetugas($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['idPetugas' => $id])->first();
  }
}
