<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\account_data;
use Illuminate\Support\Facades\Log;

class ValidatiorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        //spam
        Validator::extend('spam', function ($attribute, $value, $parameters, $validator) {
            $pythonPath =  "/var/www/laravel_docker/app/Python/";
            $command = "python3 " . $pythonPath. "load_model.py" .' "' .$value .'" 2>&1';
            exec($command, $outputs);
            Log::info($command);
            Log::info($outputs);
            return array_search("spam",$outputs) == False;
        });

    }
}
