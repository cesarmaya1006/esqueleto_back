<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inv_Entrada extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'inv__entradas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
