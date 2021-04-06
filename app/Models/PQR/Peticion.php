<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Peticion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'peticiones';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function pqr()
    {
        return $this->belongsTo(PQR::class, 'pqr_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function motivo()
    {
        return $this->belongsTo(SubMotivo::class, 'motivo_sub_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hechos()
    {
        return $this->hasMany(Hecho::class, 'peticion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexos()
    {
        return $this->hasMany(Anexo::class, 'peticion_id', 'id');
    }
    //----------------------------------------------------------------------------------
}