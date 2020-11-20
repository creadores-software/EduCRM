<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->middleware('verified');

Route::group(['prefix' => 'parametros','middleware'=>'verified'], function () {
    Route::resource('actitudesServicio', 'Parametros\ActitudServicioController', ["as" => 'parametros']);
    Route::resource('actividadesOcio', 'Parametros\ActividadOcioController', ["as" => 'parametros']);
    Route::resource('beneficios', 'Parametros\BeneficioController', ["as" => 'parametros']);
    Route::resource('estadosCiviles', 'Parametros\EstadoCivilController', ["as" => 'parametros']);
    Route::resource('estadosDisposicion', 'Parametros\EstadoDisposicionController', ["as" => 'parametros']);
    Route::resource('estatusLealtad', 'Parametros\EstatusLealtadController', ["as" => 'parametros']);
    Route::resource('estatusUsuario', 'Parametros\EstatusUsuarioController', ["as" => 'parametros']);
    Route::resource('estilosVida', 'Parametros\EstiloVidaController', ["as" => 'parametros']);
    Route::resource('frecuenciasUso', 'Parametros\FrecuenciaUsoController', ["as" => 'parametros']);
    Route::resource('generaciones', 'Parametros\GeneracionController', ["as" => 'parametros']);
    Route::resource('generos', 'Parametros\GeneroController', ["as" => 'parametros']);
    Route::resource('lugares', 'Parametros\LugarController', ["as" => 'parametros']);
    Route::resource('mediosComunicacion', 'Parametros\MedioComunicacionController', ["as" => 'parametros']);
    Route::resource('origenes', 'Parametros\OrigenController', ["as" => 'parametros']);
    Route::resource('personalidades', 'Parametros\PersonalidadController', ["as" => 'parametros']);
    Route::resource('prefijos', 'Parametros\PrefijoController', ["as" => 'parametros']);
    Route::resource('razas', 'Parametros\RazaController', ["as" => 'parametros']);
    Route::resource('religiones', 'Parametros\ReligionController', ["as" => 'parametros']);
    Route::resource('tiposContacto', 'Parametros\TipoContactoController', ["as" => 'parametros']);
    Route::resource('tiposDocumento', 'Parametros\TipoDocumentoController', ["as" => 'parametros']);
    Route::resource('tiposParentesco', 'Parametros\TipoParentescoController', ["as" => 'parametros']);
});

Route::group(['prefix' => 'entidades','middleware'=>'verified'], function () {
    Route::resource('actividadesEconomicas', 'Entidades\ActividadEconomicaController', ["as" => 'entidades']);
    Route::resource('categoriasActividadEconomica', 'Entidades\CategoriaActividadEconomicaController', ["as" => 'entidades']);
    Route::resource('entidades', 'Entidades\EntidadController', ["as" => 'entidades']);
    Route::resource('ocupaciones', 'Entidades\OcupacionController', ["as" => 'entidades']);
    Route::resource('sectores', 'Entidades\SectorController', ["as" => 'entidades']);
    Route::resource('tiposOcupacion', 'Entidades\TipoOcupacionController', ["as" => 'entidades']);
});

Route::group(['prefix' => 'formaciones','middleware'=>'verified'], function () {
    Route::resource('camposEducacion', 'Formaciones\CampoEducacionController', ["as" => 'formaciones']);
    Route::resource('categoriasCampoEducacion', 'Formaciones\CategoriaCampoEducacionController', ["as" => 'formaciones']);
    Route::resource('formaciones', 'Formaciones\FormacionController', ["as" => 'formaciones']);
    Route::resource('nivelesFormacion', 'Formaciones\NivelFormacionController', ["as" => 'formaciones']);
});

Route::group(['prefix' => 'contactos','middleware'=>'verified'], function () {
    Route::resource('contactos', 'Contactos\ContactoController', ["as" => 'contactos']);
    Route::resource('contactosTipoContacto', 'Contactos\ContactoTipoContactoController', ["as" => 'contactos']);
    Route::resource('informacionesAcademicas', 'Contactos\InformacionAcademicaController', ["as" => 'contactos']);
    Route::resource('informacionesEscolares', 'Contactos\InformacionEscolarController', ["as" => 'contactos']);
    Route::resource('informacionesLaborales', 'Contactos\InformacionLaboralController', ["as" => 'contactos']);
    Route::resource('informacionesRelacionales', 'Contactos\InformacionRelacionalController', ["as" => 'contactos']);
    Route::resource('parentescos', 'Contactos\ParentescoController', ["as" => 'contactos']);
    Route::resource('preferenciasActividadesOcio', 'Contactos\PreferenciaActividadOcioController', ["as" => 'contactos']);
    Route::resource('preferenciasCamposEducacion', 'Contactos\PreferenciaCampoEducacionController', ["as" => 'contactos']);
    Route::resource('preferenciasFormaciones', 'Contactos\PreferenciaFormacionController', ["as" => 'contactos']);
    Route::resource('preferenciasMediosComunicacion', 'Contactos\PreferenciaMedioComunicacionController', ["as" => 'contactos']);
});