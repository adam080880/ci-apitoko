<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model {
  protected $table = 'produk';
  protected $allowedFields = ['kodeproduk', 'namaproduk', 'hargaproduk'];
};
