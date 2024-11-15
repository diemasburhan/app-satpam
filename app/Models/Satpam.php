<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satpam extends Model
{
    use HasFactory;

    protected $table = 'satpams';

    protected $fillable = [
        'nama',
        'shift',
        'pos',
        'kontak',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'id_satpam');
    }
}
