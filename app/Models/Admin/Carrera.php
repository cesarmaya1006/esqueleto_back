<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Carrera extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'carreras';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'facultad_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function personas()
    {
        return $this->hasMany(Persona::class, 'carrera_id', 'id');
    }
}
