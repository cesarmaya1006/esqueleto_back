<?php

namespace App\Models\ConceptosUOpiniones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionConsulta;
use App\Models\ConceptosUOpiniones\ConceptoUOpinionDocRespuesta;

class ConceptoUOpinionRespuesta extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta_con_acla';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function peticion()
    {
        return $this->belongsTo(ConceptoUOpinionConsulta::class, 'conceptouopinionconsultas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(ConceptoUOpinionDocRespuesta::class, 'respuesta_con_acla_id', 'id');
    }
    //----------------------------------------------------------------------------------
}