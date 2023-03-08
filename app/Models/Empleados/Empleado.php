<?php

namespace App\Models\Empleados;

use App\Models\PQR\PQR;
use App\Models\Admin\Cargo;
use App\Models\PQR\Peticion;
use App\Models\PQR\PqrAnexo;
use App\Models\PQR\Resuelve;
use App\Models\Admin\Usuario;
use App\Models\Empresas\Sede;
use App\Models\Admin\Tipo_Docu;
use App\Models\Empresas\Empresa;
use App\Models\PQR\HistorialTarea;
use App\Models\PQR\ResuelveRecurso;
use App\Models\Tutela\HechosTutela;
use App\Models\Tutela\AutoAdmisorio;
use App\Models\Tutela\UnidadNegocio;
use App\Models\PQR\HistorialPeticion;
use App\Models\Tutela\HistorialHecho;
use App\Models\Tutela\ImpugnacionExterna;
use App\Models\Tutela\ImpugnacionInternaHistorial;
use App\Models\Tutela\SentenciaPHistorial;
use App\Models\Tutela\ImpugnacionResuelve;
use App\Models\Tutela\ResuelveTutela;
use App\Models\Tutela\HistorialTareas;
use App\Models\Tutela\RespuestaHechos;
use App\Models\Tutela\TutelaRespuesta;
use App\Models\PQR\HistorialAsignacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\PretensionesTutela;
use App\Models\Tutela\HistorialPretension;
use App\Models\Tutela\RespuestaPretensiones;
use App\Models\Tutela\HistorialRespuestaHecho;
use App\Models\Tutela\HistorialRespuestaImpugnacion;
use App\Models\Tutela\HistorialRespuestaPretension;
use App\Models\Tutela\ImpugnacionInterna;
use App\Models\Tutela\RespuestaImpugnaciones;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'empleados';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tipos_docu()
    {
        return $this->belongsTo(Tipo_Docu::class, 'docutipos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function peticiones()
    {
        return $this->hasMany(Peticion::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historial()
    {
        return $this->hasMany(HistorialAsignacion::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialTareas()
    {
        return $this->hasMany(HistorialTarea::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialTareasTutela()
    {
        return $this->hasMany(HistorialTareas::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialpeticiones()
    {
        return $this->hasMany(HistorialPeticion::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id');
    }
    //----------------------------------------------------------------------------------
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pqranexos()
    {
        return $this->hasMany(PqrAnexo::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelves()
    {
        return $this->hasMany(Resuelve::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelvesTutela()
    {
        return $this->hasMany(ResuelveTutela::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelvesrecurso()
    {
        return $this->hasMany(ResuelveRecurso::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tutelaregistro()
    {
        return $this->hasMany(AutoAdmisorio::class, 'empleado_rigistro_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function unidadNegocio()
    {
        return $this->hasMany(UnidadNegocio::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tutelaasignacion()
    {
        return $this->hasMany(AutoAdmisorio::class, 'empleado_asignado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestasTutela()
    {
        return $this->hasMany(TutelaRespuesta::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function hechosTutela()
    {
        return $this->hasMany(HechosTutela::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pretensionesTutela()
    {
        return $this->hasMany(PretensionesTutela::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialHechosTutela()
    {
        return $this->hasMany(HistorialHecho::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestaHechosTutela()
    {
        return $this->hasMany(RespuestaHechos::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialPretensionesTutela()
    {
        return $this->hasMany(HistorialPretension::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function respuestalPretensionesTutela()
    {
        return $this->hasMany(RespuestaPretensiones::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialRespuestaHechosTutela()
    {
        return $this->hasMany(HistorialRespuestaHecho::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialRespuestaPretensionesTutela()
    {
        return $this->hasMany(HistorialRespuestaPretension::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function impugnacionexterna()
    {
        return $this->hasMany(ImpugnacionExterna::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sentenciaphistorial()
    {
        return $this->hasMany(SentenciaPHistorial::class, 'empleado_id', 'id');
    }


    //=========
    //----------------------------------------------------------------------------------
    public function historialimpugnacioninterna()
    {
        return $this->hasMany(ImpugnacionInternaHistorial::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function historialRespuestaImpugnacion()
    {
        return $this->hasMany(HistorialRespuestaImpugnacion::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function impugnacionInterna()
    {
        return $this->hasMany(ImpugnacionInterna::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function respuestasImpugnaciones()
    {
        return $this->hasMany(RespuestaImpugnaciones::class, 'empleado_id', 'id');
    }

}
