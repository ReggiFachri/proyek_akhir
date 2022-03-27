<?php

namespace App\Controllers;

class Pages extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Landing Page DJKN Bandung'
    ];
    return view('pages/index', $data);
  }

  public function profil()
  {
    $data = [
      'title' => 'Profil DJKN Bandung'
    ];
    return view('pages/profil', $data);
  }

  public function faq()
  {
    $data = [
      'title' => 'FAQ DJKN Bandung'
    ];
    return view('pages/faq', $data);
  }

  public function permohonan_info()
  {
    $data = [
      'title' => 'Permohonan Informasi DJKN Bandung'
    ];
    return view('pages/permohonan_info', $data);
  }

  public function agenda()
  {
    $data = [
      'title' => 'Daftar Agenda DJKN Bandung'
    ];
    return view('pages/agenda_grid', $data);
  }

  public function detail_agenda()
  {
    $data = [
      'title' => 'Agenda DJKN Bandung'
    ];
    return view('pages/detail_agenda', $data);
  }

  public function berita()
  {
    $data = [
      'title' => 'Daftar Berita DJKN Bandung'
    ];
    return view('pages/berita_grid', $data);
  }
  public function artikel()
  {
    $data = [
      'title' => 'Artikel DJKN Bandung'
    ];
    return view('pages/artikel_grid', $data);
  }
  public function pengumuman()
  {
    $data = [
      'title' => 'Pengumuman DJKN Bandung'
    ];
    return view('pages/pengumuman_grid', $data);
  }
  public function peristiwa()
  {
    $data = [
      'title' => 'Kilas Peristiwa DJKN Bandung'
    ];
    return view('pages/peristiwa_grid', $data);
  }
  public function prosedur()
  {
    $data = [
      'title' => 'Prosedur DJKN Bandung'
    ];
    return view('pages/prosedur_grid', $data);
  }
  public function detail_berita()
  {
    $data = [
      'title' => 'Detail Berita DJKN Bandung'
    ];
    return view('pages/detail_berita', $data);
  }
  public function detail_artikel()
  {
    $data = [
      'title' => 'Detail Artikel Bandung'
    ];
    return view('pages/detail_artikel', $data);
  }
  public function detail_pengumuman()
  {
    $data = [
      'title' => 'Detail Pengumuman DJKN Bandung'
    ];
    return view('pages/detail_pengumuman', $data);
  }
  public function detail_peristiwa()
  {
    $data = [
      'title' => 'Detail Kilas Peristiwa DJKN Bandung'
    ];
    return view('pages/detail_peristiwa', $data);
  }
  public function detail_prosedur()
  {
    $data = [
      'title' => 'Detail Prosedur DJKN Bandung'
    ];
    return view('pages/detail_prosedur', $data);
  }
}
