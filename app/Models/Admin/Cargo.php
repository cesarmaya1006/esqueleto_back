<?php

namespace App\Models\Admin;

use App\Models\Empleados\Empleado;
use App\Models\Empresas\Sede;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cargo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'cargos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function personas()
    {
        return $this->hasMany(Persona::class, 'cargo_id', 'id');
    }
}
