<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineCheck extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'checked', 'satpam_id'];

    public function satpam()
    {
        return $this->belongsTo(User::class, 'satpam_id');
    }
}
