<?php

namespace App\Models\Admin;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Prestamo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'prestamos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
