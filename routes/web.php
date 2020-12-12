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

Route::get('/', 'HomeController@index')->middleware('auth');

Route::group(['prefix' => 'parametros','middleware'=>'auth'], function () {
    Route::get('actitudesServicio/dataAjax', 'Parametros\ActitudServicioController@dataAjax')->name('parametros.actitudesServicio.dataAjax');
    Route::resource('actitudesServicio', 'Parametros\ActitudServicioController', ["as" => 'parametros']);
    Route::get('actividadesOcio/dataAjax', 'Parametros\ActividadOcioController@dataAjax')->name('parametros.actividadesOcio.dataAjax');
    Route::resource('actividadesOcio', 'Parametros\ActividadOcioController', ["as" => 'parametros']);
    Route::get('beneficios/dataAjax', 'Parametros\BeneficioController@dataAjax')->name('parametros.beneficios.dataAjax');
    Route::resource('beneficios', 'Parametros\BeneficioController', ["as" => 'parametros']);
    Route::get('estadosCiviles/dataAjax', 'Parametros\EstadoCivilController@dataAjax')->name('parametros.estadosCiviles.dataAjax');
    Route::resource('estadosCiviles', 'Parametros\EstadoCivilController', ["as" => 'parametros']);
    Route::get('estadosDisposicion/dataAjax', 'Parametros\EstadoDisposicionController@dataAjax')->name('parametros.estadosDisposicion.dataAjax');
    Route::resource('estadosDisposicion', 'Parametros\EstadoDisposicionController', ["as" => 'parametros']);
    Route::get('estatusLealtad/dataAjax', 'Parametros\EstatusLealtadController@dataAjax')->name('parametros.estatusLealtad.dataAjax');
    Route::resource('estatusLealtad', 'Parametros\EstatusLealtadController', ["as" => 'parametros']);
    Route::get('estatusUsuario/dataAjax', 'Parametros\EstatusUsuarioController@dataAjax')->name('parametros.estatusUsuario.dataAjax');
    Route::resource('estatusUsuario', 'Parametros\EstatusUsuarioController', ["as" => 'parametros']);
    Route::get('estilosVida/dataAjax', 'Parametros\EstiloVidaController@dataAjax')->name('parametros.estilosVida.dataAjax');
    Route::resource('estilosVida', 'Parametros\EstiloVidaController', ["as" => 'parametros']);
    Route::get('frecuenciasUso/dataAjax', 'Parametros\FrecuenciaUsoController@dataAjax')->name('parametros.frecuenciasUso.dataAjax');
    Route::resource('frecuenciasUso', 'Parametros\FrecuenciaUsoController', ["as" => 'parametros']);
    Route::get('generaciones/dataAjax', 'Parametros\GeneracionController@dataAjax')->name('parametros.generaciones.dataAjax');
    Route::resource('generaciones', 'Parametros\GeneracionController', ["as" => 'parametros']);
    Route::get('generos/dataAjax', 'Parametros\GeneroController@dataAjax')->name('parametros.generos.dataAjax');
    Route::resource('generos', 'Parametros\GeneroController', ["as" => 'parametros']);    
    Route::get('lugares/dataAjax', 'Parametros\LugarController@dataAjax')->name('parametros.lugares.dataAjax');
    Route::get('lugares/childrenCount', 'Parametros\LugarController@childrenCount')->name('parametros.lugares.childrenCount');
    Route::get('lugares/parents', 'Parametros\LugarController@parents')->name('parametros.lugares.parents');
    Route::resource('lugares', 'Parametros\LugarController', ["as" => 'parametros']);
    Route::get('mediosComunicacion/dataAjax', 'Parametros\MedioComunicacionController@dataAjax')->name('parametros.mediosComunicacion.dataAjax');
    Route::resource('mediosComunicacion', 'Parametros\MedioComunicacionController', ["as" => 'parametros']);
    Route::get('origenes/dataAjax', 'Parametros\OrigenController@dataAjax')->name('parametros.origenes.dataAjax');
    Route::resource('origenes', 'Parametros\OrigenController', ["as" => 'parametros']);
    Route::get('personalidades/dataAjax', 'Parametros\PersonalidadController@dataAjax')->name('parametros.personalidades.dataAjax');
    Route::resource('personalidades', 'Parametros\PersonalidadController', ["as" => 'parametros']);
    Route::get('prefijos/dataAjax', 'Parametros\PrefijoController@dataAjax')->name('parametros.prefijos.dataAjax');
    Route::resource('prefijos', 'Parametros\PrefijoController', ["as" => 'parametros']);
    Route::get('razas/dataAjax', 'Parametros\RazaController@dataAjax')->name('parametros.razas.dataAjax');
    Route::resource('razas', 'Parametros\RazaController', ["as" => 'parametros']);
    Route::get('religiones/dataAjax', 'Parametros\ReligionController@dataAjax')->name('parametros.religiones.dataAjax');
    Route::resource('religiones', 'Parametros\ReligionController', ["as" => 'parametros']);
    Route::get('tiposContacto/dataAjax', 'Parametros\TipoContactoController@dataAjax')->name('parametros.tiposContacto.dataAjax');
    Route::resource('tiposContacto', 'Parametros\TipoContactoController', ["as" => 'parametros']);
    Route::get('tiposDocumento/dataAjax', 'Parametros\TipoDocumentoController@dataAjax')->name('parametros.tiposDocumento.dataAjax');
    Route::resource('tiposDocumento', 'Parametros\TipoDocumentoController', ["as" => 'parametros']);
    Route::get('tiposParentesco/dataAjax', 'Parametros\TipoParentescoController@dataAjax')->name('parametros.tiposParentesco.dataAjax');
    Route::resource('tiposParentesco', 'Parametros\TipoParentescoController', ["as" => 'parametros']);
});

Route::group(['prefix' => 'entidades','middleware'=>'auth'], function () {
    Route::get('actividadesEconomicas/dataAjax', 'Entidades\ActividadEconomicaController@dataAjax')->name('entidades.actividadesEconomicas.dataAjax');
    Route::resource('actividadesEconomicas', 'Entidades\ActividadEconomicaController', ["as" => 'entidades']);
    Route::get('categoriasActividadEconomica/dataAjax', 'Entidades\CategoriaActividadEconomicaController@dataAjax')->name('entidades.categoriasActividadEconomica.dataAjax');
    Route::resource('categoriasActividadEconomica', 'Entidades\CategoriaActividadEconomicaController', ["as" => 'entidades']);
    Route::get('entidades/dataAjax', 'Entidades\EntidadController@dataAjax')->name('entidades.entidades.dataAjax');
    Route::resource('entidades', 'Entidades\EntidadController', ["as" => 'entidades']);
    Route::get('ocupaciones/dataAjax', 'Entidades\OcupacionController@dataAjax')->name('entidades.ocupaciones.dataAjax');
    Route::resource('ocupaciones', 'Entidades\OcupacionController', ["as" => 'entidades']);
    Route::get('sectores/dataAjax', 'Entidades\SectorController@dataAjax')->name('entidades.sectores.dataAjax');
    Route::resource('sectores', 'Entidades\SectorController', ["as" => 'entidades']);
    Route::get('tiposOcupacion/dataAjax', 'Entidades\TipoOcupacionController@dataAjax')->name('entidades.tiposOcupacion.dataAjax');
    Route::resource('tiposOcupacion', 'Entidades\TipoOcupacionController', ["as" => 'entidades']);
});

Route::group(['prefix' => 'formaciones','middleware'=>'auth'], function () {
    Route::get('camposEducacion/dataAjax', 'Formaciones\CampoEducacionController@dataAjax')->name('formaciones.camposEducacion.dataAjax');
    Route::resource('camposEducacion', 'Formaciones\CampoEducacionController', ["as" => 'formaciones']);
    Route::get('categoriasCampoEducacion/dataAjax', 'Formaciones\CategoriaCampoEducacionController@dataAjax')->name('formaciones.categoriasCampoEducacion.dataAjax');
    Route::resource('categoriasCampoEducacion', 'Formaciones\CategoriaCampoEducacionController', ["as" => 'formaciones']);
    Route::get('formaciones/dataAjax', 'Formaciones\FormacionController@dataAjax')->name('formaciones.formaciones.dataAjax');
    Route::resource('formaciones', 'Formaciones\FormacionController', ["as" => 'formaciones']);
    Route::get('nivelesFormacion/dataAjax', 'Formaciones\NivelFormacionController@dataAjax')->name('formaciones.nivelesFormacion.dataAjax');
    Route::resource('nivelesFormacion', 'Formaciones\NivelFormacionController', ["as" => 'formaciones']);
});

Route::group(['prefix' => 'contactos','middleware'=>'auth'], function () {
    Route::get('contactos/dataAjax', 'Contactos\ContactoController@dataAjax')->name('contactos.contactos.dataAjax');
    Route::resource('contactos', 'Contactos\ContactoController', ["as" => 'contactos']);
    Route::resource('contactosTipoContacto', 'Contactos\ContactoTipoContactoController', ["as" => 'contactos']);
    Route::resource('informacionesAcademicas', 'Contactos\InformacionAcademicaController', ["as" => 'contactos']);
    Route::resource('informacionesEscolares', 'Contactos\InformacionEscolarController', ["as" => 'contactos']);
    Route::resource('informacionesLaborales', 'Contactos\InformacionLaboralController', ["as" => 'contactos']);
    Route::resource('informacionesRelacionales', 'Contactos\InformacionRelacionalController', ["as" => 'contactos','except'=> ['index','create','store','destroy']]);
    Route::resource('parentescos', 'Contactos\ParentescoController', ["as" => 'contactos']);  
    Route::resource('preferenciasActividadesOcio', 'Contactos\PreferenciaActividadOcioController', ["as" => 'contactos']);
    Route::resource('preferenciasCamposEducacion', 'Contactos\PreferenciaCampoEducacionController', ["as" => 'contactos']);
    Route::resource('preferenciasFormaciones', 'Contactos\PreferenciaFormacionController', ["as" => 'contactos']);
    Route::resource('preferenciasMediosComunicacion', 'Contactos\PreferenciaMedioComunicacionController', ["as" => 'contactos']);
});


