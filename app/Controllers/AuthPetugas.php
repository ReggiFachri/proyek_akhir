<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use App\Models\UserModel;
use App\Models\AuthModel;


class AuthPetugas extends BaseController
{
  protected $PetugasModel;
  protected $UserModel;

  public function __construct()
  {
    $this->PetugasModel = new PetugasModel();
    $this->UserModel = new UserModel();
  }
  public function register()
  {
    $val = $this->validate(
      [
        'nip' => [
          'rules' => 'is_unique[customer.nik]',
          'errors' => [
            'is_unique' => 'NIK sudah terdaftar',
          ]
        ],
        'email' => [
          'rules' => 'is_unique[customer.email]',
          'errors' => [
            'is_unique' => 'Email sudah terdaftar'
          ]
        ]

      ]

    );
    if (!$val) {
      $validation = \Config\Services::validation();
      return redirect()->to('/register_cust')->withInput()->with('validation', $validation);
    }

    $hashedPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

    $this->PetugasModel->save([
      'Nama' => $this->request->getVar('nama'),
      'NIP' => $this->request->getVar('nip'),
      'Email' => $this->request->getVar('email'),
      // 'kantor' => $this->request->getVar('kantor'),
      'Unit' => $this->request->getVar('unit'),
      'idLevel' => $this->request->getVar('level'),
      'Password' => $hashedPassword
    ]);

    $this->UserModel->save([
      'Email' => $this->request->getVar('email'),
      'Password' => $hashedPassword,
      'idLevel' => $this->request->getVar('level')
    ]);

    session()->setFlashdata('pesan', 'Selamat Anda Berhasil Registrasi');
    return redirect()->to('/login_cust');
  }

  public function login()
  {
    $model = new AuthModel;
    $table = 'petugas_apt';
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $row = $model->get_data_login2($email, $table);
    if ($row == NULL) {
      session()->setFlashdata('pesan', 'Email anda tidak terdaftar');
      return redirect()->to('/login_petugas');
    }

    if (password_verify($password, $row->Password)) {
      $data = [
        'log_petugas' => TRUE,
        'nama' => $row->Nama,
        'nip' => $row->NIP,
        'email' => $row->Email,
        'unit' => $row->Unit,
        'idPetugas' => $row->idPetugas

      ];
      session()->set($data);
      session()->setFlashdata('pesan', 'Berhasil Login');
      return redirect()->to('/admin');
    } else {
      session()->setFlashdata('pesan', 'Password salah');
      return redirect()->to('/login_petugas');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashdata('pesan', 'Berhasil Logout');
    return redirect()->to('/login_petugas');
  }
}
