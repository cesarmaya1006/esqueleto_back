<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inventario extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'inventarios';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function productos()
    {
        return $this->hasMany(Producto::class, 'inventario_id', 'id');
    }

}
