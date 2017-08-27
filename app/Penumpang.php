<?php

namespace App;

class Penumpang extends Firebase
{
    protected $primaryKey = "id_penumpang";
    protected $fillable = ["alamat", "foto", "jklm", "nama", "password", "telp", "username", "blokir"];
}
