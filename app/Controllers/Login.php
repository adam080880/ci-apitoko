<?php

namespace App\Controllers;

use App\Controllers\RestfulController;
use App\Models\LoginModel;
use App\Models\MemberModel;
use Exception;

class Login extends RestfulController {
  public function index() {
    try {
      $data = [
        'email' => $this->request->getVar('email'),
        'password' => $this->request->getVar('password'),
      ];

      if (!$data['email'] || !$data['password']) {
        return $this->responseHasil(400, false, null, 'Semua field wajib diisi');
      }

      $memberModel = new MemberModel();
      $member = $memberModel->where(['email' => $data['email']])->first();

      if (!$member) {
        return $this->responseHasil(400, false, null, 'Email tidak ditemukan');
      }

      if (!password_verify($data['password'], $member['password'])) {
        return $this->responseHasil(400, false, null, 'Password tidak cocok');
      }

      $generatedAuthKey = $this->randomString();
  
      $loginModel = new LoginModel();
      $loginModel->save([
        'member_id' => $member['id'],
        'auth_key' => $generatedAuthKey,
      ]);
  
      return $this->responseHasil(200, true, [
        'token' => $generatedAuthKey,
        'user' => [
          'id' => $member['id'],
          'email' => $member['email']
        ]
      ], 'Berhasil login');
    } catch (Exception $error) {
      return $this->responseHasil(500, false, null, $error->getMessage());
    }
  }

  private function randomString($len = 100) {
    $karakter = '012345678dssd9abcdefghijklmnopqrstuwwxyzABCDEFGHIJKLMNOPORSTUVWXYZ';

    $panjangKarakter = strlen($karakter);
    $str = '';

    for ($i = 0; $i < $len; $i++) {
      $str .= $karakter[random_int(0, $panjangKarakter - 1)];
    }

    return $str;
  }
};
