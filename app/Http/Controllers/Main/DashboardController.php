<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Admin\Calon;
use App\Models\Admin\Pemilih;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private Calon $calon;
    private Pemilih $pemilih;

    public function __construct(Calon $calon, Pemilih $pemilih)
    {
        $this->calon = $calon;
        $this->pemilih = $pemilih;
    }

    public function index()
    {
        return response()->view('main.dashboard', [
            'tampilCalon' => $this->calon->tampilCalon(),
            'tampilPemilih' => $this->pemilih->tampilPemilih()
        ]);
    }
}
