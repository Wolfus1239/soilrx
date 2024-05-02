<?php

namespace App\Components;

class ImportDataMl
{
    public $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'http://soilrx-ml-1:8000/',
            'timeout' => 5.0,
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'verify' => false
        ]);
    }
    }

?>
