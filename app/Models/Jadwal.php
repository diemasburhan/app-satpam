<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Jadwal extends Model
{
    use HasFactory;

    /**
     * Table associated with the model.
     */
    protected $table = 'jadwal_tugas';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'satpam_id',
        'tanggal', 
        'shift', 
        'area', 
        'status'
    ];

    /**
     * Relasi ke model Satpam.
     */
    public function satpam()
    {
        return $this->belongsTo(Satpam::class, 'id_satpam');
    }
}
