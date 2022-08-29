<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemilih extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nim',
        'angkatan',
        'kelas',
        'foto_pemilih',
    ];

    protected $with = ['voting'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voting()
    {
        return $this->hasOne(Voting::class);
    }

    public function scopeRelasi($query, $relasi, $column)
    {
        if (!$relasi) {
            return $query->select(DB::raw('count(id) as ' . $column));
        }
        return $query->$relasi('voting')->select(DB::raw('count(id) as ' . $column));
    }

    public function tampilPemilih()
    {
        return $this->without('voting')->limit(4)->addSelect(
            [
                'sudah_voting' => $this->relasi('has', 'sudah_voting'),
                'belum_voting' => $this->relasi('doesntHave', 'belum_voting'),
                'total_pemilih' => $this->relasi(relasi: null, column: 'total_pemilih'),
            ]
        )->orderByDesc(Voting::select('created_at')->whereColumn('pemilih_id', 'pemilihs.id')->orderByDesc('created_at')->limit(1))->get();
    }

    public function pemilihTerbaru()
    {
        return $this->has('voting')->limit(4)->orderByDesc(Voting::select('created_at')->whereColumn('pemilih_id', 'pemilihs.id')->orderByDesc('created_at')->limit(1))->get();
    }

    public function addVoting(Calon $calon)
    {
        $pemilih = Auth::user()->pemilih;

        return $pemilih->voting()->create(['calon_id' => $calon->id]);
    }

    public function deleteVoting(array $nim)
    {
        $pemilihResets = $this->whereIn('nim', $nim)->get();

        foreach ($pemilihResets as $pemilihReset) {
            $pemilihReset->voting()->delete();
        }
    }
}
