<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama',
        'nim',
        'angkatan',
        'kelas',
        'foto_calon',
        'calonkan',
    ];

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }

    public function kampanye()
    {
        return $this->hasOne(Kampanye::class);
    }

    // query Calon Aktif Calon
    public function scopeTampil($query)
    {
        return $query->whereCalonkan(true);
    }

    // Menampikan Calon
    public function tampilCalon()
    {
        return $this->has('kampanye')->with(['kampanye'])->withCount('votings as jumlah_voting')->tampil()->get();
    }

    public function aktifCalon()
    {
        if($this->whereCalonkan(true)->count() >= 3) {
            return true;
        }
        return false;
    }
}
