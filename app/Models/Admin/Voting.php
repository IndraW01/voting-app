<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemilih_id',
        'calon_id',
    ];

    public function Pemilih()
    {
        return $this->belongsTo(Pemilih::class);
    }

    public function calon()
    {
        return $this->belongsTo(Calon::class);
    }
}
