<?php

namespace App\Providers;

use App\Models\Parametros\Lugar;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class DuskServiceProvider extends ServiceProvider
{
    public static $except = [];

    /**
     * Register the Dusk's browser macros.
     *
     * @return void
     */
    public function boot()
    {
        //Solo aplica en Local y Pruebas
        if (in_array(env('APP_ENV'),['local','testing'])) {        

            /**
             * Modifica el valor de un campo de tipo select2
            **/
            \Laravel\Dusk\Browser::macro('asignarValorSelect2', function ($element,$class,$name,$id) {
                if($class!="value"){
                    $objeto=$class::where('id',$id)->first();
                    if(str_contains($name, '()')){
                        $nombreMetodo=str_replace("()", "", $name);
                        $valor=$objeto->$nombreMetodo();
                    }else{
                        $valor=$objeto->$name;
                    }
                }else{               
                    $objeto=$class; 
                    $valor=$name;   
                }
                if(!empty($objeto) && !empty($valor)){   
                    $script='jQuery("'.$element.'").append(
                            $("<option selected=\'selected\'></option>")
                            .val('.$id.').text("'.$valor.'")
                        ).trigger("change");';
                    $this->script($script); 
                    //Log::debug('El script es '. $script);
                }                     
                return $this;
            });

            /**
             * Modifica el valor de un campo múltiple de tipo select2
            **/
            \Laravel\Dusk\Browser::macro('asignarValorMultipleSelect2', function ($element,$class,$name,$ids) {
                if(sizeof($ids)>0){
                    $objetos=$class::whereIn('id',$ids)->get(); 
                    if($objetos->count()>0){
                        foreach($objetos as $objeto){
                            $this->script(
                                'jQuery("'.$element.'").append(
                                    $("<option selected=\'selected\'></option>")
                                    .val('.$objeto->id.').text("'.$objeto->$name.'")
                                ).trigger("change");');
                        }  
                    }   
                }              
                return $this;
            });

            /**
             * Limpia todos los campos de tipo select2
            **/
            \Laravel\Dusk\Browser::macro('limpiarTodosSelect2', function () {
                $script='jQuery(".select2-hidden-accessible").empty().trigger("change");';
                $this->script($script);                 
                return $this;
            });

             /**
             * Limpia un campo de tipo select2
            **/
            \Laravel\Dusk\Browser::macro('limpiarSelect2', function ($elemento) {
                $script='jQuery("'.$elemento.'").empty().trigger("change");';
                $this->script($script);                 
                return $this;
            });

            /**
             * Valida si existe un campo dentro de un seleccionable de tipo select2
            **/
            \Laravel\Dusk\Browser::macro('assertValorEnSelect2', function ($element,$textoSi,$textoNo=null) {
                $highlightedClass    = '.select2-results__option--highlighted';
                $highlightedSelector = '.select2-results__options ' . $highlightedClass;
                
                $this->click($element.' + .select2');
                $this->waitFor($highlightedSelector, 2);
                $this->assertSee($textoSi);  
                if(!empty($textoNo)){
                    $this->assertDontSee($textoNo);
                }
                $this->click($highlightedSelector);
                $this->click('.navbar');
                return $this;
            });

            /**
             * Confirma que exista un elemento de tipo 
             * datepicker al hacer clic sobre el elemento
            **/
            \Laravel\Dusk\Browser::macro('assertDateTimeExistente', function ($element) {
                $this->click($element);
                $claseDatePicker=".bootstrap-datetimepicker-widget";
                $this->assertVisible($claseDatePicker);
                return $this;
            });

            /**
             * Asigna una fecha a un campo dateTimePicker
             */
            \Laravel\Dusk\Browser::macro('asignarFecha', function ($elemento,$fecha) {
                $anio = $fecha->year;
                $mes = $fecha->month;
                $dia = $fecha->day;
                $fecha_completa="{$anio}-{$mes}-{$dia}";
                $script="document.querySelector('{$elemento}').value = '{$fecha_completa}'";
                $this->script($script);
                $this->click('.navbar'); // Para cerrar la selección de fecha
                return $this;
            });

            /**
             * Valida que el componente de ubicación solicite el pais y en caso 
             * de ser Colombia también debe pedir departamento y ciudad
             */
            \Laravel\Dusk\Browser::macro('assertValidarUbicacion', function ($elemento) {
                $ubicacionExterior = Lugar::where('nombre','<>','Colombia')->where('tipo','P')->first();
                $ubicacionColombia = Lugar::where('nombre','Colombia')->where('tipo','P')->first();
                $ciudad = Lugar::where('tipo','C')->inRandomOrder()->first();
                
                if(!empty($ubicacionExterior) && !empty($ubicacionColombia) && !empty($ciudad)){
                    $departamento = $ciudad->lugarPadre;
                    $clase="App\Models\Parametros\Lugar";
                    
                    //En el caso de pais del exterior no debe solicitar nuevamente ubicación
                    $this->asignarValorSelect2($elemento,$clase,'nombre',$ubicacionExterior->id);
                    $this->assertNotPresent('.location-pre');
                    $this->assertSeeIn($elemento.' + .select2', $ubicacionExterior->nombre);
                    
                    //En el caso de ser Colombia debe asignarla como enlace y pedir departamento
                    $this->asignarValorSelect2($elemento,$clase,'nombre',$ubicacionColombia->id);
                    $this->waitForLink($ubicacionColombia->nombre,2);
                    $this->assertDontSeeIn($elemento.' + .select2', $ubicacionColombia->nombre);                
                    
                    //En caso de asignar departamento debe ser visible la ciudad y quedar establecida al seleccionar
                    $this->asignarValorSelect2($elemento,$clase,'nombre',$departamento->id);
                    $this->waitForLink($departamento->nombre,2);
                    $this->asignarValorSelect2($elemento,$clase,'nombre',$ciudad->id);
                    $this->assertSeeIn($elemento.' + .select2', $ciudad->nombre);
                }
                return $this;
            });

            /**
             * Asigna una ubicación aleatoria al componente
             */
            \Laravel\Dusk\Browser::macro('asignarUbicacion', function ($elemento) {
                $ubicacionColombia = Lugar::where('nombre','Colombia')->where('tipo','P')->first();
                $ciudad = Lugar::where('tipo','C')->inRandomOrder()->first();
                $departamento = $ciudad->lugarPadre;
                $clase="App\Models\Parametros\Lugar";
                $this->asignarValorSelect2($elemento,$clase,'nombre',$ubicacionColombia->id);
                $this->waitForLink($ubicacionColombia->nombre,5);
                $this->asignarValorSelect2($elemento,$clase,'nombre',$departamento->id);
                $this->waitForLink($departamento->nombre,5);
                $this->asignarValorSelect2($elemento,$clase,'nombre',$ciudad->id);
                return $this;
            });
        }
    }
}
