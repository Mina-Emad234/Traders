<?php


namespace App\Services;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;


class DatabaseCreating
{

    public function createDatabase($dbName)
    {
        DB::statement('create database ' . $dbName);
        Artisan::call('tenants:artisan "migrate"');
    }
}
