<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampanye extends Model
{
    use HasFactory;

    protected $fillable = [
        'calon_id',
        'visi',
        'misi',
    ];

    public function calon()
    {
        return $this->belongsTo(Calon::class);
    }
}
