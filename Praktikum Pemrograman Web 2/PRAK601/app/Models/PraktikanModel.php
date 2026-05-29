<?php

namespace App\Models;

use CodeIgniter\Model;

class PraktikanModel extends Model
{
    public function getProfilLengkap()
    {
        return [
            'nama'   => 'Muhammad Naufal Khalish', 
            'nim'    => '2410817110004',
            'prodi'  => 'Teknologi Informasi',
            'hobi'   => 'Homesick, Nostalgia, Kangen Rumah',
            'skill'  => 'Adobe Family, Draw, Concept Character',
            'gambar' => 'https://ui-avatars.com/api/?name=User&size=128' 
        ];
    }
}