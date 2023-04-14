<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrasiModel extends Model {
  protected $table = 'member';
  protected $allowedFields = ['nama', 'email', 'password'];
};
