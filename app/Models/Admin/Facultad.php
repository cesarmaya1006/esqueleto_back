<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Facultad extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'facultads';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function carreras()
    {
        return $this->hasMany(Carrera::class, 'facultad_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
