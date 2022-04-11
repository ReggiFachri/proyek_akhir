<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\PetugasModel;
use App\Models\Tanggapan_POModel;
use PhpParser\Node\Expr\FuncCall;

class Pengaduan_online extends BaseController
{
    protected $Pengaduan_onlineModel;
    protected $KategoriModel;
    protected $CustModel;
    protected $PetugasModel;
    protected $Tanggapan_POModel;

    public function __construct()
    {
        $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
        $this->KategoriModel = new kategoriModel();
        $this->CustModel = new CustModel();
        $this->PetugasModel = new PetugasModel();
        $this->Tanggapan_POModel = new Tanggapan_POModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Riwayat Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->listPengaduanCustomer(session('idCustomer')),
            'belum' => $this->Pengaduan_onlineModel->jumlahPengaduan(session('idCustomer'), 'Belum diproses'),
            'proses' => $this->Pengaduan_onlineModel->jumlahPengaduan(session('idCustomer'), 'Sedang diproses'),
            'selesai' => $this->Pengaduan_onlineModel->jumlahPengaduan(session('idCustomer'), 'Selesai diproses'),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/view_pengaduan_online', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile Customer',
            'customer' => $this->CustModel->getCustomer(session('idCustomer'))
        ];

        return view('pengaduan_online/profile_customer', $data);
    }


    public function rating($id)
    {
        $data = [
            'title' => 'Rating & Ulasan',
            'pengaduan' => $this->Pengaduan_onlineModel->getPengaduan($id)
        ];

        return view('pengaduan_online/rating_pengaduan_online', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->getPengaduan($id),
            'customer' => $this->CustModel->getCustomer(),
            'kategori' => $this->KategoriModel->getKategori(),
            'petugas' => $this->PetugasModel->getPetugas(),
            'tanggapan' => $this->Tanggapan_POModel->getTanggapan()
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

    public function in_profile()
    {
        $this->CustModel->save([
            'idCustomer' => $this->request->getVar('idCustomer'),
            'Nama' => $this->request->getVar('nama'),
            'Email' => $this->request->getVar('email'),
            'Pekerjaan' => $this->request->getVar('pekerjaan')
        ]);

        session()->setFlashdata('pesan', 'berhasil menyunting profil.');

        return redirect()->to('/Pengaduan_online/profile');
    }

    public function in_rate()
    {
        $this->Pengaduan_onlineModel->save([
            'idPengaduan' => $this->request->getVar('idPengaduan'),
            'Rating' => $this->request->getVar('rating'),
            'Ulasan' => $this->request->getVar('ulasan')
        ]);

        session()->setFlashdata('pesan', 'berhasil memberikan ulasan.');

        return redirect()->to('/Pengaduan_online');
    }

    public function input()
    // tambah label tiap rules
    {
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
