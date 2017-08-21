<?php

namespace Vessel;

use Illuminate\Support\ServiceProvider;

class VesselServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            VESSEL_PATH.'/docker-files/docker' => base_path('docker'),
            VESSEL_PATH.'/docker-files/docker-compose.yml' => base_path('docker-compose.yml'),
            VESSEL_PATH.'/docker-files/vessel' => base_path('vessel'),
        ]);
    }

    public function register()
    {
        if (! defined('VESSEL_PATH')) {
            define('VESSEL_PATH', realpath(__DIR__.'/../'));
        }
    }

}