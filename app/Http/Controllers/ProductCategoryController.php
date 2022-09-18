<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class ProductCategoryController
{
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Config::get('services.packt_token')
        ])->get('https://www.packtpub.com/api/products/category/Cloud%20&%20Networking');
        
        echo "<pre>";
        print_r($response->body());
        echo "<pre>";
        die();
    }

    public function get($category_name)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . Config::get('services.packt_token')
        ])->get('https://www.packtpub.com/api/products/category');
    }
}
