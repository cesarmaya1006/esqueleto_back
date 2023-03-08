<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Intranet\Admin\RolController;
use App\Http\Controllers\Intranet\Admin\MenuController;
use App\Http\Controllers\Extranet\ExtranetPageController;
use App\Http\Controllers\Intranet\Admin\MenuRolController;
use App\Http\Controllers\Intranet\Admin\PermisoController;
use App\Http\Controllers\Intranet\Admin\UsuarioController;
use App\Http\Controllers\Intranet\Empresas\AreaController;
use App\Http\Controllers\Intranet\Admin\PermisoRolController;
use App\Http\Controllers\Intranet\Admin\IntranetPageCotroller;
use App\Http\Controllers\Intranet\Carnet\CarnetController as CarnetCarnetController;
use App\Http\Controllers\Intranet\Empresas\CargoController;
use App\Http\Controllers\Universidad\CarreraController;
use App\Http\Controllers\Universidad\DependenciaController;
use App\Http\Controllers\Universidad\FacultadController;
use App\Http\Controllers\Universidad\InventarioController;
use App\Http\Controllers\Universidad\InvEntradaController;
use App\Http\Controllers\Universidad\InvSalidaController;
use App\Http\Controllers\Universidad\PrestamoController;
use App\Models\Admin\Usuario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
});
Route::get('/migrar-bd', function () {
    echo Artisan::call('migrate:refresh');
});
//---------------------------------------------------------------------------------
Route::get('/', [ExtranetPageController::class, 'index'])->name('index');
Route::get('/index', [ExtranetPageController::class, 'index'])->name('index_2');
Route::get('/solicitar_password', [ExtranetPageController::class,'solicitar_password',])->name('solicitar_password');
Route::post('/cambiar_password', [ExtranetPageController::class,'cambiar_password',])->name('cambiar_password');
Route::get('/preguntas_frecuentes', [ExtranetPageController::class,'preguntas_frecuentes',])->name('preguntas_frecuentes');
Route::get('/index3', [ExtranetPageController::class, 'index_3'])->name('index_3');
Route::get('/registro_ini', [ExtranetPageController::class,'registro_ini',])->name('registro_ini');
Route::post('/registro_ini-guardar', [ExtranetPageController::class,'registro_ini_guardar',])->name('registro_ini-guardar');
Route::get('/registro_ext/{id}/{cc}/{tipo}', [ExtranetPageController::class,'registro_ext',])->name('registro_ext');
Route::get('/registro_conf', [ExtranetPageController::class,'registro_conf',])->name('registro_conf');
Route::get('/parametros', [ExtranetPageController::class, 'parametros'])->name('parametros');
Route::post('/parametros-guardar', [ExtranetPageController::class,'parametros_guardar',])->name('parametros-guardar');
Route::post('/cargar_tipo_documentos', [ExtranetPageController::class,'cargar_tipo_documentos',])->name('cargar_tipo_documentos');
//---------------------------------------------------------------------------------
Route::group(['middleware' => 'auth'], function () {
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'admin'], function () {
        Route::get('index', [IntranetPageCotroller::class, 'index'])->name('admin-index');
        Route::post('restablecer-password', [IntranetPageCotroller::class,'restablecer_password',])->name('admin-restablecer_password');
        // Rutas Index
        // ------------------------------------------------------------------------------------
        Route::group(['middleware' => 'adminSistema'], function () {
            // Ruta Administrador del Sistema Menus
            // ------------------------------------------------------------------------------------
            Route::get('menu-index', [MenuController::class, 'index'])->name('admin-menu-index');
            Route::get('menu-crear', [MenuController::class, 'crear'])->name('admin-menu-crear');
            Route::get('menu/{id}/editar', [MenuController::class,'editar',])->name('admin-menu-editar');
            Route::post('menu', [MenuController::class, 'guardar'])->name('admin-menu-guardar');
            Route::put('menu/{id}', [MenuController::class,'actualizar',])->name('admin-menu-actualizar');
            Route::get('menu/{id}/eliminar', [MenuController::class,'eliminar',])->name('admin-menu-eliminar');
            Route::get('menu-guardar-orden', [MenuController::class,'guardarOrden',])->name('admin-menu-guardar-orden');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Roles
            Route::get('rol-index', [RolController::class, 'index'])->name('admin-rol-index');
            Route::get('rol-crear', [RolController::class, 'crear'])->name('admin-rol-crear');
            Route::get('rol/{id}/editar', [RolController::class,'editar',])->name('admin-rol-editar');
            Route::post('rol', [RolController::class, 'guardar'])->name('admin-rol-guardar');
            Route::put('rol/{id}', [RolController::class, 'actualizar'])->name('admin-rol-actualizar');
            Route::delete('rol/{id}/eliminar', [RolController::class,'eliminar',])->name('admin-rol-eliminar');
            Route::get('roles/export/', [RolController::class,'exportarExcel',])->name('roles-exportarExcel');
            // ------------------------------------------------------------------------------------
            /*RUTAS Administrador del Sistema MENU_ROL*/
            Route::get('_menus_rol', [MenuRolController::class, 'index'])->name('admin-menu_rol');
            Route::post('_menus_rol', [MenuRolController::class,'guardar',])->name('admin-guardar_menu_rol');
            // ------------------------------------------------------------------------------------
            /*RUTAS DE PERMISO*/
            Route::get('permiso-index', [PermisoController::class,'index',])->name('admin-permiso-index');
            Route::get('permiso-crear/{pagVolver?}', [PermisoController::class,'crear',])->name('admin-crear_permiso');
            Route::post('permiso', [PermisoController::class, 'guardar'])->name('admin-guardar_permiso');
            Route::get('permiso/{id}/editar', [PermisoController::class,'editar',])->name('admin-editar_permiso');
            Route::put('permiso/{id}', [PermisoController::class,'actualizar',])->name('admin-actualizar_permiso');
            Route::delete('permiso/{id}', [PermisoController::class,'eliminar',])->name('admin-eliminar_permiso');
            // ------------------------------------------------------------------------------------
            /*RUTAS PERMISO_ROL*/
            Route::get('_permiso-rol', [PermisoRolController::class,'index',])->name('admin-permiso_rol');
            Route::post('_permiso-rol', [PermisoRolController::class,'guardar',])->name('admin-guardar_permiso_rol');

            // ------------------------------------------------------------------------------------
        });
        // ------------------------------------------------------------------------------------
        Route::group(['middleware' => 'administrador'], function () {
            // Ruta Administrador del Sistema Usuarios
            Route::get('usuario-index', [UsuarioController::class,'index',])->name('admin-usuario-index');
            Route::get('usuario-crear', [UsuarioController::class,'crear',])->name('admin-usuario-crear');
            Route::post('usuario', [UsuarioController::class, 'guardar'])->name('admin-usuario-guardar');
            Route::get('usuario/{id}/editar', [UsuarioController::class,'editar',])->name('admin-usuario-editar');
            Route::put('usuario/{id}', [UsuarioController::class,'actualizar',])->name('admin-usuario-actualizar');
            Route::delete('usuario/{id}', [UsuarioController::class,'eliminar',])->name('admin-usuario-eliminar');
            // ------------------------------------------------------------------------------------
        });
        // ------------------------------------------------------------------------------------
    });
});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
