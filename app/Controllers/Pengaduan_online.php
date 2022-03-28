<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\KategoriModel;
use App\Models\CustModel;

class Pengaduan_online extends BaseController
{
    protected $Pengaduan_onlineModel;
    protected $KategoriModel;
    protected $CustModel;

    public function __construct()
    {
        $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
        $this->KategoriModel = new kategoriModel();
        $this->CustModel = new CustModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Riwayat Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->listPengaduanCustomer(session('idCustomer')),
            'proses' => $this->Pengaduan_onlineModel->jumlahPengaduanDiproses(session('idCustomer')),
            'belum' => $this->Pengaduan_onlineModel->jumlahPengaduanBelumDiproses(session('idCustomer')),
            'selesai' => $this->Pengaduan_onlineModel->jumlahPengaduanSelesaiDiproses(session('idCustomer')),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/view_pengaduan_online', $data);
    }

    public function rating($id)
    {
        $data = [
            'pengaduan' => $this->Pengaduan_onlineModel->getPengaduan($id)
        ];

        return view('pengaduan_online/rating_pengaduan_online', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->getPengaduan($id),
            'customer' => $this->CustModel->getCustomer(session('idCustomer')),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/detail_pengaduan_online', $data);
    }

    public function form()
    {
        $data = [
            'title' => 'Pengajuan Pengaduan Online',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/form_pengaduan_online', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengaduan Online',
            'validation' => \Config\Services::validation(),
            'pengaduan' => $this->Pengaduan_onlineModel->getPengaduan($id),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/edit_pengaduan_online', $data);
    }

    public function input()
    // tambah label tiap rules
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'min_length[5]',
                'errors' => [
                    'min_length' => 'Judul pengaduan minimal 5 karakter'
                ]
            ],
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
            $validation = \Config\Services::validation();
            return redirect()->to('/Pengaduan_online/form')->withInput()->with('validation', $validation);
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


        $this->Pengaduan_onlineModel->save([
            'Judul' => $this->request->getVar('judul'),
            'Isi' => $this->request->getVar('isi'),
            'idKategori' => $this->request->getVar('kategori'),
            'Lampiran' => $namalampiran,
            'Status' => 'Belum diproses',
            'idCustomer' => $this->request->getVar('idCustomer')
        ]);

        session()->setFlashdata('pesan', 'berhasil menambahkan pengaduan.');

        return redirect()->to('/Pengaduan_online');
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'min_length[5]',
                'errors' => [
                    'min_length' => 'Judul pengaduan minimal 5 karakter'
                ]
            ],
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
            $validation = \Config\Services::validation();
            return redirect()->to('/Pengaduan_online/Edit/' . $id)->withInput()->with('validation', $validation);
        }

        $pengaduan = $this->Pengaduan_onlineModel->find($id);

        if ($pengaduan['Lampiran'] != 'user.png') {
            //hapus file lampiran
            unlink('lampiran/' . $pengaduan['Lampiran']);
        }

        $lampiran = $this->request->getFile('lampiran');
        if ($lampiran->getError() == 4) {
            $namalampiran = 'user.png';
        } else {
            //ambil nama file
            $namalampiran = $lampiran->getRandomName();
            //pindah file
            $lampiran->move('lampiran', $namalampiran);
        }

        $this->Pengaduan_onlineModel->save([
            'idPengaduan' => $id,
            'Judul' => $this->request->getVar('judul'),
            'Isi' => $this->request->getVar('isi'),
            'idKategori' => $this->request->getVar('kategori'),
            'Lampiran' => $namalampiran,
            'Status' => 'Belum diproses',
            'idCustomer' => $this->request->getVar('idCustomer')
        ]);

        session()->setFlashdata('pesan', 'berhasil mengubah pengaduan.');

        return redirect()->to('/Pengaduan_online');
    }

    public function cancel($id)
    {
        $this->Pengaduan_onlineModel->save([
            'idPengaduan' => $id,
            'Status' => 'Dibatalkan'
        ]);

        session()->setFlashdata('pesan', 'berhasil membatalkan pengaduan.');

        return redirect()->to('/Pengaduan_online');
    }

    public function delete($id)
    {
        $pengaduan = $this->Pengaduan_onlineModel->find($id);

        if ($pengaduan['Lampiran'] != 'user.png') {
            //hapus file lampiran
            unlink('lampiran/' . $pengaduan['Lampiran']);
        }

        $this->Pengaduan_onlineModel->delete($id);

        session()->setFlashdata('pesan', 'berhasil menghapus pengaduan.');

        return redirect()->to('/Pengaduan_online');
    }
}
