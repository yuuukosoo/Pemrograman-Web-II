<?php

namespace App\Controllers;
use App\Models\PraktikanModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new PraktikanModel();
        $data['mhs'] = $model->getProfilLengkap();
        return view('beranda', $data);
    }

    public function profil()
    {
        $model = new PraktikanModel();
        $data['detail'] = $model->getProfilLengkap();
        return view('profil', $data);
    }

}
