<?php

namespace App\Trait;

use App\Models\Admin\Pemilih;
use Yajra\DataTables\DataTables;

trait DatatableTrait {
    public function datatablePemilih()
    {
        $pemilih = Pemilih::get();
        return Datatables::of($pemilih)
            ->addIndexColumn()
            ->addColumn('checkVote', function(Pemilih $pemilih){
                $btnCheck = $pemilih->voting ? '<div class="form-check">
                                                    <input class="form-check-input checks" type="checkbox" name=vote[] value="'. $pemilih->nim .'"
                                                </div>'
                                             : '-';
                return $btnCheck;
            })
            ->addColumn('vote', function(Pemilih $pemilih) {
                $vote = $pemilih->voting ? '<a href="#" class="badge text-bg-success">Sudah Vote</a>' : '<a href="#" class="badge text-bg-secondary">Belum Vote</a>';
                return $vote;
            })
            ->editColumn('created_at', function(Pemilih $pemilih) {
                return $pemilih->created_at->diffForHumans();
            })
            ->rawColumns(['vote', 'checkVote'])
            ->make(true);
    }
}

?>
