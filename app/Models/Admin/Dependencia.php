<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dependencia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'dependencias';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'dependencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
