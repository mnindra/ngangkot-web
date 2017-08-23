<?php

namespace App;

class Admin extends Firebase
{

  public function __construct() {
    parent::__construct();
    $this->primaryKey = 'id_admin';
    $this->fillable = ['nama', 'telp', 'username', 'password'];
  }

}
