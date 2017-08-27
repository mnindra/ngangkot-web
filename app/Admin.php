<?php

namespace App;

class Admin extends Firebase
{
  protected $primaryKey = 'id_admin';
  protected $fillable = ['nama', 'telp', 'email', 'password'];
}
