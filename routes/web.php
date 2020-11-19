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
    Route::resource('tiposDocumento', 'Parametros\TipoDocumentoController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('actitudesServicio', 'Parametros\ActitudServicioController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'entidades'], function () {
    Route::resource('actividadesEconómicas', 'Entidades\ActividadEconomicaController', ["as" => 'entidades']);
});


Route::group(['prefix' => 'entidades'], function () {
    Route::resource('actividadesEconomicas', 'Entidades\ActividadEconomicaController', ["as" => 'entidades']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('actividadesOcio', 'Parametros\ActividadOcioController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('beneficios', 'Parametros\BeneficioController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'formaciones'], function () {
    Route::resource('camposEducacion', 'Formaciones\CampoEducacionController', ["as" => 'formaciones']);
});


Route::group(['prefix' => 'entidades'], function () {
    Route::resource('categoriasActividadEconomica', 'Entidades\CategoriaActividadEconomicaController', ["as" => 'entidades']);
});


Route::group(['prefix' => 'formaciones'], function () {
    Route::resource('categoriasCampoEducacion', 'Formaciones\CategoriaCampoEducacionController', ["as" => 'formaciones']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('contactos', 'Contactos\ContactoController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('contactosTipoContacto', 'Contactos\ContactoTipoContactoController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'entidades'], function () {
    Route::resource('entidades', 'Entidades\EntidadController', ["as" => 'entidades']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('estadosCiviles', 'Parametros\EstadoCivilController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('estadosDisposicion', 'Parametros\EstadoDisposicionController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('estatusLealtad', 'Parametros\EstatusLealtadController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('estatusUsuario', 'Parametros\EstatusUsuarioController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('estilosVida', 'Parametros\EstiloVidaController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'formaciones'], function () {
    Route::resource('formaciones', 'Formaciones\FormacionController', ["as" => 'formaciones']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('frecuenciasUso', 'Parametros\FrecuenciaUsoController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('generaciones', 'Parametros\GeneracionController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('generos', 'Parametros\GeneroController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('informacionesAcademicas', 'Contactos\InformacionAcademicaController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('informacionesEscolares', 'Contactos\InformacionEscolarController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('informacionesLaborales', 'Contactos\InformacionLaboralController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('informacionesRelacionales', 'Contactos\InformacionRelacionalController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('preferenciasActividadesOcio', 'Contactos\PreferenciaActividadOcioController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('lugares', 'Parametros\LugarController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('mediosComunicacion', 'Parametros\MedioComunicacionController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'formaciones'], function () {
    Route::resource('nivelesFormacion', 'Formaciones\NivelFormacionController', ["as" => 'formaciones']);
});


Route::group(['prefix' => 'entidades'], function () {
    Route::resource('ocupaciones', 'Entidades\OcupacionController', ["as" => 'entidades']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('origenes', 'Parametros\OrigenController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('parentescos', 'Parametros\ParentescoController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('personalidades', 'Parametros\PersonalidadController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('preferenciasCamposEducacion', 'Contactos\PreferenciaCampoEducacionController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('preferenciasFormaciones', 'Contactos\PreferenciaFormacionController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'contactos'], function () {
    Route::resource('preferenciasMediosComunicacion', 'Contactos\PreferenciaMedioComunicacionController', ["as" => 'contactos']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('prefijos', 'Parametros\PrefijoController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('razas', 'Parametros\RazaController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('religiones', 'Parametros\ReligionController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'entidades'], function () {
    Route::resource('sectores', 'Entidades\SectorController', ["as" => 'entidades']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('tiposContacto', 'Parametros\TipoContactoController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('tiposDocumento', 'Parametros\TipoDocumentoController', ["as" => 'parametros']);
});


Route::group(['prefix' => 'entidades'], function () {
    Route::resource('tiposOcupacion', 'Entidades\TipoOcupacionController', ["as" => 'entidades']);
});


Route::group(['prefix' => 'parametros'], function () {
    Route::resource('tiposParentesco', 'Parametros\TipoParentescoController', ["as" => 'parametros']);
});
