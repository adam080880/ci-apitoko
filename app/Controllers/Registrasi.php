<?php

namespace App\Controllers;

use App\Controllers\RestfulController;
use App\Models\RegistrasiModel;
use Exception;

class Registrasi extends RestfulController {
  public function index() {
    try {
      $data = [
        'nama' => $this->request->getVar('nama'),
        'email' => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      ];

      if (!$data['nama'] || !$data['email'] || !$data['password']) {
        return $this->responseHasil(400, false, null, 'Semua field wajib diisi');
      }
  
      $registrasiModel = new RegistrasiModel();
      $registrasiModel->save($data);
  
      return $this->responseHasil(200, true, null, 'Berhasil registrasi');
    } catch (Exception $error) {
      return $this->responseHasil(500, false, null, 'Gagal registrasi');
    }
  }
};
