<?php

namespace App;

class Rute extends Firebase
{
    protected $primaryKey = 'id_rute';
    protected $fillable = ['id_rute','biaya','keterangan','rute'];
}
