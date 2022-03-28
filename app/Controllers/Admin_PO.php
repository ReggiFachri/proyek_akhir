<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\Tanggapan_POModel;
use App\Models\CustModel;
use App\Models\KategoriModel;

class Admin_PO extends BaseController
{
    protected $pengaduan_onlineModel;
    protected $Tanggapan_POModel;
    protected $CustModel;
    protected $KategoriModel;

    public function __construct()
    {
        $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
        $this->Tanggapan_POModel = new Tanggapan_POModel();
        $this->CustModel = new CustModel();
        $this->KategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->listPengaduanAdmin(),
            'kategori' => $this->KategoriModel->getKategori(),
            'proses' => 0,
            'selesai' => 0
        ];

        return view('pengaduan_online/admin_beranda', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengaduan Online',
            'validation' => \Config\Services::validation(),
            'pengaduan' => $this->Pengaduan_onlineModel->getPengaduan($id),
            'customer' => $this->CustModel->getCustomer(1),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/admin_detail', $data);
    }

    public function tanggapan($idPengaduan)
    {
        $data = [
            'title' => 'Tanggapan',
            'validation' => \Config\Services::validation(),
            'idPengaduan' => $idPengaduan
        ];

        return view('pengaduan_online/admin_tanggapan', $data);
    }

    public function proses($id)
    {
        helper('date');
        $now = date('Y-m-d H:i:s', now());

        $this->Pengaduan_onlineModel->save([
            'idPengaduan' => $id,
            'Status' => 'Sedang diproses'
        ]);

        session()->setFlashdata('pesan', 'Pengaduan mulai diproses');

        return redirect()->to('/admin');
    }

    public function inputTanggapan()
    {
        if (!$this->validate([
            'isi' => [
                'rules' => 'max_length[200]|min_length[5]',
                'errors' => [
                    'max_length' => 'Isi pengaduan maksimal 200 karakter',
                    'min_length' => 'Isi pengaduan minimal 5 karakter'
                ]
            ],
            'lampiran' => [
                'rules' => 'max_size[lampiran,5120]|ext_in[lampiran,jpg,jpeg,png,pdf,mp3,mpeg]',
                'errors' => [
                    'max_size' => 'Maksimal 5MB',
                    'ext_in' => 'jenis file harus jpg, png, pdf, mp3, atau mpeg'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            return redirect()->to('/admin/tanggapan')->withInput()->with('validation', $validation);
        }

        //ambil file
        $lampiran = $this->request->getFile('lampiran');
        if ($lampiran->getError() == 4) {
            $namalampiran = 'user.png';
        } else {
            //ambil nama file
            $namalampiran = $lampiran->getRandomName();
            //pindah file
            $lampiran->move('lampiran', $namalampiran);
        }


        $this->Tanggapan_POModel->save([
            'Isi' => $this->request->getVar('isi'),
            'Lampiran' => $namalampiran,
            'idPengaduan' => $this->request->getVar('idPengaduan')
        ]);

        session()->setFlashdata('pesan', 'Tanggapan berhasil tersimpan.');

        return redirect()->to('/admin');
    }
}
