<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanggapan_POModel extends Model
{
    protected $table      = 'tanggapan_po';
    protected $primaryKey = 'idTanggapan_PO ';

    protected $allowedFields = ['Isi', 'Lampiran', 'tgl_mulai', 'tgl_selesai', 'Rating', 'Ulasan', 'NIP', 'idPengaduan'];

    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'tgl_mulai';
    protected $updatedField  = 'tgl_selesai';

    public function getTanggapan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idTanggapan_PO ' => $id])->first();
    }
}
