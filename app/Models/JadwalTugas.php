<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTugas extends Model
{
    use HasFactory;

    protected $fillable = ['satpam_id', 'tanggal', 'shift', 'area', 'status'];

    public function satpam()
    {
        return $this->belongsTo(Satpam::class);
    }
}
