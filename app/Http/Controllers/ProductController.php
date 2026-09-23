<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    private function getProducts()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Laptop',
                'price' => 45000,
                'quantity' => 5,
                'category' => 'Electronics'
            ],

            2 => [
                'id' => 2,
                'name' => 'Smartphone',
                'price' => 15000,
                'quantity' => 10,
                'category' => 'Electronics'
            ],

            3 => [
                'id' => 3,
                'name' => 'Keyboard',
                'price' => 1200,
                'quantity' => 15,
                'category' => 'Accessories'
            ],

            4 => [
                'id' => 4,
                'name' => 'Mouse',
                'price' => 800,
                'quantity' => 20,
                'category' => 'Accessories'
            ],

            5 => [
                'id' => 5,
                'name' => 'Headset',
                'price' => 2500,
                'quantity' => 8,
                'category' => 'Accessories'
            ],

            6 => [
                'id' => 6,
                'name' => 'Printer',
                'price' => 8500,
                'quantity' => 4,
                'category' => 'Electronics'
            ],
        ];
    }

    
    public function index(Request $request)
    {
        $category = $request->query('category', '');
        $quantity = $request->query('quantity', '');

        $products = $this->getProducts();

        
        if ($category !== '') {
            $products = array_filter($products, function ($product) use ($category) {
                return strcasecmp($product['category'], $category) === 0;
            });
        }

        
        if ($quantity !== '') {
            $products = array_filter($products, function ($product) use ($quantity) {
                return (string) $product['quantity'] === (string) $quantity;
            });
        }

        return view('products.index', [
            'products' => $products,
            'category' => $category,
            'quantity' => $quantity
        ]);
    }

    
    public function show($id)
    {
        $products = $this->getProducts();

        if (!isset($products[$id])) {
            abort(404);
        }

        $product = $products[$id];

        return view('products.show', [
            'product' => $product
        ]);
    }

    
    public function featured()
    {
        $products = $this->getProducts();

        $product = $products[1];

        return view('products.featured', [
            'product' => $product
        ]);
    }
}