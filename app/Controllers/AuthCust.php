<?php

namespace App\Controllers;

use App\Models\CustModel;
use App\Models\UserModel;
use App\Models\AuthModel;

class AuthCust extends BaseController
{
  protected $CustModel;
  protected $UserModel;

  public function __construct()
  {
    $this->CustModel = new CustModel();
    $this->UserModel = new UserModel();
  }
  public function register()
  {
    $val = $this->validate(
      [
        'nik' => [
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

    $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

    $this->CustModel->save([
      'Nama' => $this->request->getVar('nama'),
      'NIK' => $this->request->getVar('nik'),
      'Email' => $this->request->getVar('email'),
      'Pekerjaan' => $this->request->getVar('pekerjaan'),
      'Password' => $hashedPassword,
      'idLevel' => '5'
    ]);

    $this->UserModel->save([
      'Email' => $this->request->getVar('email'),
      'Password' => $hashedPassword,
      'idLevel' => '5'
    ]);

    session()->setFlashdata('pesan_regis', 'Selamat Anda Berhasil Registrasi');
    return redirect()->to('/login_cust');
  }

  public function login()
  {
    $model = new AuthModel;
    $table = 'user';
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $row = $model->get_data_login($email, $table);
    if ($row == NULL) {
      session()->setFlashdata('pesan', 'Email anda tidak terdaftar');
      return redirect()->to('/login_cust');
    }

    if (password_verify($password, $row->Password)) {
      $data = [
        'log' => TRUE,
        'email' => $row->Email,
        'idLevel' => $row->idLevel,
      ];

      if ($data['idLevel'] == 5) {
        $row_cust = $model->get_data_login($data['email'], 'customer');

        $data = [
          'log' => TRUE,
          'idCustomer' => $row_cust->idCustomer,
          'NIK' => $row_cust->NIK,
          'Nama' => $row_cust->Nama,
          'Email' => $row_cust->Email,
          'Pekerjaan' => $row_cust->Pekerjaan,
          'idLevel' => $row_cust->idLevel
        ];

        session()->set($data);
        session()->setFlashdata('pesan', 'Berhasil Login');

        return redirect()->to('Pengaduan_online');
      } elseif ($data['idLevel'] != 5) {
        $row_petugas = $model->get_data_login($data['email'], 'petugas_apt');

        $data = [
          'log' => TRUE,
          'idPetugas' => $row_petugas->idPetugas,
          'NIP' => $row_petugas->NIP,
          'Nama' => $row_petugas->Nama,
          'Email' => $row_petugas->Email,
          'Unit' => $row_petugas->Unit,
          'idLevel' => $row_petugas->idLevel
        ];

        session()->set($data);
        session()->setFlashdata('pesan', 'Berhasil Login');

        return redirect()->to('admin');
      }
    } else {
      session()->setFlashdata('pesan', 'Password salah');
      return redirect()->to('/login_cust');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashdata('pesan', 'Berhasil Logout');
    return redirect()->to('login_cust');
  }
}
