<?php

namespace Tests;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Compara dos arreglos confirmando que cuenten con la misma información
     * Sirve para validar entre lo creado y lo guardado.
     */
    public function sonDatosIguales(Array $actualData, Array $expectedData)
    {
        foreach ($actualData as $key => $value) {
            if (in_array($key, ['created_at', 'updated_at','password','email_verified_at'])) {
                continue;
            }
            if(!array_key_exists($key,$expectedData)){
                continue;    
            }
            if($actualData[$key]!=$expectedData[$key]){
                return false;
            }           
        }
        return true;
    }
}
