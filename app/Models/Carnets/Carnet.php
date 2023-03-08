<?php

namespace App\Models\Carnets;

use App\Models\Admin\Rol;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Carnet extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'carnets';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
