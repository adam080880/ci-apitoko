<?php

namespace App\Controllers;

use App\Controllers\RestfulController;
use App\Models\ProdukModel;

use Exception;

class Produk extends RestfulController {
  public function create() {
    $data = [
      'kodeproduk' => $this->request->getVar('kodeproduk'),
      'namaproduk' => $this->request->getVar('namaproduk'),
      'hargaproduk' => $this->request->getVar('hargaproduk'),
      'hargabeliproduk' => $this->request->getVar('hargabeliproduk'),
      'kategorigroupproduk' => $this->request->getVar('kategorigroupproduk'),
    ];

    $produkModel = new ProdukModel();
    $produkModel->insert($data);
    $produk = $produkModel->find($produkModel->getInsertID());

    return $this->responseHasil(200, true, $produk, 'success');
  }

  public function list() {
    $produkModel = new ProdukModel();
    $allProduk = $produkModel->findAll();
    
    return $this->responseHasil(200, true, $allProduk, 'success');
  }

  public function detail($id) {
    $produkModel = new ProdukModel();
    $produk = $produkModel->find($id);
    
    return $this->responseHasil(200, true, $produk, 'success');
  }

  public function ubah($id) {
    $data = [
      'kodeproduk' => $this->request->getVar('kodeproduk'),
      'namaproduk' => $this->request->getVar('namaproduk'),
      'hargaproduk' => $this->request->getVar('hargaproduk'),
      'hargabeliproduk' => $this->request->getVar('hargabeliproduk'),
      'kategorigroupproduk' => $this->request->getVar('kategorigroupproduk'),
    ];

    $produkModel = new ProdukModel();
    $produkModel->update($id, $data);

    $produk = $produkModel->find($id);
    
    return $this->responseHasil(200, true, $produk, 'success');
  }

  public function hapus($id) {
    $produkModel = new ProdukModel();
    $produk = $produkModel->delete($id);
    
    return $this->responseHasil(200, true, $produk, 'success');
  }
};
