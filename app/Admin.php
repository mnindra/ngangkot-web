<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{
  protected $primaryKey = 'id_admin';
  protected $fillable = ['nama', 'telp', 'username', 'password'];
}
