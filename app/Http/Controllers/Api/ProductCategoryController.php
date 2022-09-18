<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

class ProductCategoryController
{
    public function index()
    {
        $books_categories = [
            [
                'name' => 'Web Development',
                'key' => ''
            ],
            [
                'name' => 'Data',
                'key' => ''
            ],
            [
                'name' => 'Programming',
                'key' => ''
            ],
            [
                'name' => 'Cloud & Networking',
                'key' => ''
            ],
        ];
        return response()->json($books_categories);
    }
}
