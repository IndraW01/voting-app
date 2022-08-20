<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Calon;
use App\Models\Admin\Pemilih;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardVotingController extends Controller
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
        return response()->view('user.dashboard', [
            'tampilCalon' => $this->calon->tampilCalon()
        ]);
    }

    public function voting(Calon $calon)
    {
        DB::beginTransaction();

        try {
            $pemilihvote = $this->pemilih->addVoting($calon);

            DB::commit();

            return back()->with('successVote', 'Berhasil Melakukan Vote untuk calon ' . $pemilihvote->calon->nama);
        } catch(Exception $exception) {
            DB::rollBack();

            dd($exception->getMessage());
        }
    }
}
