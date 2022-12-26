<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\account_data;

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
            $pythonPath =  "../app/Python/";
            $command = $command = "python3 " . $pythonPath. "load_model.py" .' "' .$value .'"';
            exec($command, $outputs);
            return array_search("spam",$outputs) == FALSE;
        });

        Validator::extend('not_exist_id', function ($attribute, $value, $parameters, $validator) {
            $TakeId = account_data::select('userid')->where('userid', $value)->get();
            $TakeIdarr = $TakeId -> toArray();
            return !empty($TakeIdarr);
        });

        Validator::extend('not_exist_pass', function ($attribute, $value, $parameters, $validator) {
            $TakePass = account_data::select('passward')->where('passward',hash("sha256", $value))->get();
            $TakePassarr = $TakePass -> toArray();
            return !empty($TakePassarr); 
        });

    }
}
