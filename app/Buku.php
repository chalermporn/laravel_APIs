<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
    	'judul_buku',
    	'tahun_terbit',
    	'pengarang',
    	'penerbit',
    	'jumlah_halaman'
    ];
}
