<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('iunique', function ($attribute, $value, $parameters, $validator) {
            $query = DB::table($parameters[0]);
            $column = $query->getGrammar()->wrap($parameters[1]);
    
            if (isset($parameters[2])) {
                if (isset($parameters[3])) {
                    $idCol = $parameters[3];
                } else {
                    $idCol = 'id';
                }
    
                $query->where($idCol, '!=', $parameters[2]);
            }
    
            return ! $query->whereRaw("lower({$column}) = lower(?)", [$value])->count();
        });    
    }
}
