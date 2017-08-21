<?php

use Illuminate\Support\ServiceProvider;

class VesselServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            VESSEL_PATH.'/docker-files/docker' => base_path(),
            VESSEL_PATH.'/docker-files/docker-compose.yml' => base_path(),
            VESSEL_PATH.'/docker-files/vessel' => base_path(),
        ]);
    }

    public function register()
    {
        if (! defined('VESSEL_PATH')) {
            define('VESSEL_PATH', realpath(__DIR__.'/../'));
        }
    }

}