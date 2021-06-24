<?php

namespace App\Providers;

use Facebook\WebDriver\WebDriverBy;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\Browser;

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
        // Modifica el valor de un campo de tipo select2
        Browser::macro('asignarValorSelect2', function ($element,$text,$value) {
            $this->script(
                'jQuery("'.$element.'").append(
                    $("<option selected=\'selected\'></option>")
                    .val('.$value.').text("'.$text.'")
                ).trigger("change");');
            return $this;
        });

        // Valida si existe un campo dentro de un seleccionable de tipo select2
        Browser::macro('assertValorEnSelect2', function ($element,$textoSi,$textoNo=null) {
            $highlightedClass    = '.select2-results__option--highlighted';
            $highlightedSelector = '.select2-results__options ' . $highlightedClass;
            
            $this->click($element.' + .select2');
            $this->waitFor($highlightedSelector, 2);
            $this->assertSee($textoSi);  
            if(!empty($textoNo)){
                $this->assertDontSee($textoNo);
            }
            return $this;
        });

        /**
         * Confirma que exista un elemento de tipo 
         * datepicker al hacer clic sobre el elemento
        **/
        Browser::macro('assertDateTimeExistente', function ($element) {
            $this->click($element);
            $claseDatePicker=".bootstrap-datetimepicker-widget";
            $this->assertVisible($claseDatePicker);
            return $this;
        });

        /**
         * Asigna una fecha a un campo dateTimePicker
        **/
        Browser::macro('asignarFecha', function ($elemento,$fecha) {
            $anio = $fecha->year;
            $mes = $fecha->month;
            $dia = $fecha->day;
            $fecha_completa="{$anio}-{$mes}-{$dia}";
            $this->script([
                "document.querySelector('{$elemento}').value = '{$fecha_completa}'",
            ]);
            return $this;
        });
    }
}
