<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $session = session();
    if ($session->get('log_cust') != TRUE) {
      return redirect()->to('/login_cust');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    $session = session();
    if ($session->get('log_cust') == TRUE) {
      return redirect()->to('/Pengaduan_online');
    }
  }
}
