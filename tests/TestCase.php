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
    public function assertModelData(Array $actualData, Array $expectedData)
    {
        foreach ($actualData as $key => $value) {
            if (in_array($key, ['created_at', 'updated_at'])) {
                continue;
            }
            if(!array_key_exists($key,$expectedData)){
                continue;    
            }
            $this->assertEquals($actualData[$key], $expectedData[$key],"No coincide el campo {$key}");            
        }
    }
}
