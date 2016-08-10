<?php

use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'judul_buku'	=> 'True Story',
        		'tahun_terbit'	=> 2015,
        		'pengarang'		=> 'Jhon Smith',
        		'penerbit'		=> 'Book Pedia',
        		'jumlah_halaman'=> 456
        	],
        	[
        		'judul_buku'	=> 'Cinta Suci Zahrana',
        		'tahun_terbit'	=> 2013,
        		'pengarang'		=> 'Hizburahman',
        		'penerbit'		=> 'Erlangga',
        		'jumlah_halaman'=> 700
        	],        	
        	[
        		'judul_buku'	=> 'Ketika Cinta Bertasbih',
        		'tahun_terbit'	=> 2012,
        		'pengarang'		=> 'Hizburahman Smith',
        		'penerbit'		=> 'Penerbit Indah',
        		'jumlah_halaman'=> 567
        	]
        ];

         DB::table('buku')->insert($data);

    }
}
