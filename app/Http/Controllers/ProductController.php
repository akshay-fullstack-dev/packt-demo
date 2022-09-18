<?php

namespace App\Http\Controllers;

use App\Enum\Packt;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class ProductController
{
    public function index()
    {
        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . Config::get('services.packt_token')
        // ])->get(Packt::BASE_URL . 'products');

        // echo "<pre>";
        // print_r($response->body());
        // echo "<pre>";
        // die();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Config::get('services.packt_token')
        ])->get('https://www.packtpub.com/api/products/category/all');

        echo "<pre>";
        print_r($response->body());
        echo "<pre>";
        die();
    }
}
