<?php

namespace App;

class Pengemudi extends Firebase
{
    protected $primaryKey = "id_pengemudi";
    protected $fillable = [
      "alamat",
      "angkutan",
      "foto",
      "id_pengemudi",
      "jklm",
      "nama",
      "password",
      "telp",
      "username",
      "blokir"
    ];
}
