<?php

namespace App\Controllers;

use App\Models\LevelModel;
use App\Models\KategoriModel;

class Frontend extends BaseController
{
  protected $LevelModel;
  protected $KategoriModel;

  public function __construct()
  {
    $this->LevelModel = new LevelModel();
    $this->KategoriModel = new KategoriModel();
  }
  public function register_cust()
  {

    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Registrasi Customer'
    ];
    return view('frontend/register_cust', $data);
  }

  public function register_petugas()
  {

    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Registrasi Petugas LP',
      'level' => $this->LevelModel->getlevel(),
      'kategori' => $this->KategoriModel->getKategori()


    ];
    return view('frontend/register_petugas', $data);
  }

  public function login_cust()
  {
    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Login Customer'
    ];
    return view('frontend/login_cust', $data);
  }

  public function login_petugas()
  {
    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Login Petugas LP'
    ];
    return view('frontend/login_petugas', $data);
  }
}
