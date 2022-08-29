<?php

namespace App\Trait;

use App\Models\Admin\Calon;
use App\Models\Admin\Pemilih;
use Yajra\DataTables\DataTables;

trait DatatableTrait
{
    public function datatablePemilih()
    {
        $pemilih = Pemilih::get();
        return Datatables::of($pemilih)
            ->addIndexColumn()
            ->addColumn('checkVote', function (Pemilih $pemilih) {
                $btnCheck = $pemilih->voting ? '<div class="form-check">
                                                    <input class="form-check-input checks" type="checkbox" name=vote[] value="' . $pemilih->nim . '"
                                                </div>'
                    : '-';
                return $btnCheck;
            })
            ->addColumn('vote', function (Pemilih $pemilih) {
                $vote = $pemilih->voting ? '<a href="#" class="badge text-bg-success">Sudah Vote</a>' : '<a href="#" class="badge text-bg-secondary">Belum Vote</a>';
                return $vote;
            })
            ->addColumn('voting', function (Pemilih $pemilih) {
                $voting =  $pemilih->voting->calon->nama ?? '-';
                return $voting;
            })
            ->rawColumns(['vote', 'checkVote', 'voting'])
            ->make(true);
    }

    public function datatableCalon()
    {
        $calon = Calon::get();
        return Datatables::of($calon)
            ->addIndexColumn()
            ->addColumn('action', function (Calon $calon) {
                $btnCheck = '<a href="' . route("calon.edit", $calon) . '" class="btn btn-warning me-2 mb-2">
                                <i class="bi bi-plus-circle-fill"></i> Edit
                            </a>
                            <a href="' . route("calon.show", $calon) . '" class="btn btn-info me-2 mb-2">
                                <i class="bi bi-pencil-fill"></i> Detail
                            </a>
                            <form action="' . route("calon.destroy", $calon) . '" class="d-inline border-0 hapusCalon" method="POST">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger me-2 mb-2" value="' . $calon->nama . '"><i class="bi bi-trash-fill"></i> Hapus</button>
                            </form>';
                return $btnCheck;
            })
            ->addColumn('foto_calon', function (Calon $calon) {
                $foto = '<img src="' . asset("storage/calon/" . $calon->foto_calon) . '" width="60">';
                return $foto;
            })
            ->editColumn('calonkan', function (Calon $calon) {
                $calonKan = $calon->calonkan ? '<a href="#" class="badge text-bg-success">Active</a>' : '<a href="#" class="badge text-bg-secondary">Non Active</a>';
                return $calonKan;
            })
            ->rawColumns(['action', 'calonkan', 'foto_calon'])
            ->make(true);
    }
}
