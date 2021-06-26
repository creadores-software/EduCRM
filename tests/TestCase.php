<?php

namespace Tests;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Console\Kernel;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        return self::initialize();
    }

    private static $configurationApp = null;

    public static function initialize(){

        if(is_null(self::$configurationApp)){
            $app = require __DIR__.'/../bootstrap/app.php';
            $app->loadEnvironmentFrom('.env.testing');
            $app->make(Kernel::class)->bootstrap();

            if (config('database.default') == 'sqlite') {
                $db = app()->make('db');
                $db->connection()->getPdo()->exec("pragma foreign_keys=1");
            }

            Artisan::call('migrate');
            Artisan::call('db:seed');

            self::$configurationApp = $app;
            return $app;
        }

        return self::$configurationApp;
    }

    protected function tearDown(): void
    {
        if ($this->app) {
            foreach ($this->beforeApplicationDestroyedCallbacks as $callback) {
                call_user_func($callback);
            }
        }

        $this->setUpHasRun = false;

        if (property_exists($this, 'serverVariables')) {
            $this->serverVariables = [];
        }

        if (class_exists('Mockery')) {
            Mockery::close();
        }
        $this->afterApplicationCreatedCallbacks = [];
        $this->beforeApplicationDestroyedCallbacks = [];
    }

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
