<?php

namespace App\Repository\Impl;

use App\Repository\RegisterRepository;

class RegisterRepositoryImpl implements RegisterRepository {

    public function upload($file, $path = 'pemilih')
    {
        $namaFoto = time() . rand(1, 1000) . '-' . $file->getClientOriginalName();

        $file->storePubliclyAs('public/' . $path, $namaFoto);

        return $namaFoto;
    }
}

?>
