<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Producto extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'productos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function salidasinv()
    {
        return $this->hasMany(Inv_Salida::class, 'producto_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function entradasinv()
    {
        return $this->hasMany(Inv_Entrada::class, 'producto_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'producto_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
