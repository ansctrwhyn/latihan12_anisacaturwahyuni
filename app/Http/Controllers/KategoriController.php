<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {

        $categories = [
            [
                "id" => 1,
                "name" => "Samsung",
                "created_at" => "2024-08-26 09:42:17",
                "updated_at" => "2024-08-27 09:42:17"
            ],
            [
                "id" => 2,
                "name" => "Apple",
                "created_at" => "2024-08-26 09:43:20",
                "updated_at" => "2024-08-27 09:43:20"
            ],
            [
                "id" => 3,
                "name" => "Oppo",
                "created_at" => "2024-08-26 09:44:25",
                "updated_at" => "2024-08-27 09:44:25"
            ],
            [
                "id" => 4,
                "name" => "Vivo",
                "created_at" => "2024-08-26 09:46:35",
                "updated_at" => "2024-08-27 09:46:35"
            ],
            [
                "id" => 5,
                "name" => "Xiaomi",
                "created_at" => "2024-08-26 09:47:40",
                "updated_at" => "2024-08-27 09:47:40"
            ]
        ];

        $products = [
            [
                "id" => "SM0001",
                "name" => "Samsung Galaxy S21",
                "category_id" => 1,
                "price" => 15000000,
                "diskon" => 0.2,
                "created_at" => "2024-08-27 10:00:00",
                "updated_at" => "2024-08-27 10:00:00"
            ],
            [
                "id" => "SM0002",
                "name" => "Samsung Galaxy Note 20",
                "category_id" => 1,
                "price" => 18000000,
                "diskon" => 0.2,
                "created_at" => "2024-08-27 10:05:00",
                "updated_at" => "2024-08-27 10:05:00"
            ],
            [
                "id" => "IP0003",
                "name" => "iPhone 13 Pro",
                "category_id" => 2,
                "price" => 20000000,
                "diskon" => 0.1,
                "created_at" => "2024-08-27 10:10:00",
                "updated_at" => "2024-08-27 10:10:00"
            ],
            [
                "id" => "IP0004",
                "name" => "iPhone SE",
                "category_id" => 2,
                "price" => 10000000,
                "diskon" => 0.1,
                "created_at" => "2024-08-27 10:15:00",
                "updated_at" => "2024-08-27 10:15:00"
            ],
            [
                "id" => "OP0005",
                "name" => "Oppo Find X3 Pro",
                "category_id" => 3,
                "price" => 12000000,
                "diskon" => 0.15,
                "created_at" => "2024-08-27 10:20:00",
                "updated_at" => "2024-08-27 10:20:00"
            ],
            [
                "id" => "OP0006",
                "name" => "Oppo Reno 5",
                "category_id" => 3,
                "price" => 9000000,
                "diskon" => 0.15,
                "created_at" => "2024-08-27 10:25:00",
                "updated_at" => "2024-08-27 10:25:00"
            ],
            [
                "id" => "VV0007",
                "name" => "Vivo X60 Pro",
                "category_id" => 4,
                "price" => 13000000,
                "diskon" => 0.1,
                "created_at" => "2024-08-27 10:30:00",
                "updated_at" => "2024-08-27 10:30:00"
            ],
            [
                "id" => "VV0008",
                "name" => "Vivo V21",
                "category_id" => 4,
                "price" => 8000000,
                "diskon" => 0.1,
                "created_at" => "2024-08-27 10:35:00",
                "updated_at" => "2024-08-27 10:35:00"
            ],
            [
                "id" => "XM0009",
                "name" => "Xiaomi Mi 11",
                "category_id" => 5,
                "price" => 10000000,
                "diskon" => 0.3,
                "created_at" => "2024-08-27 10:40:00",
                "updated_at" => "2024-08-27 10:40:00"
            ],
            [
                "id" => "XM0010",
                "name" => "Xiaomi Redmi Note 10",
                "category_id" => 5,
                "price" => 6000000,
                "diskon" => 0.3,
                "created_at" => "2024-08-27 10:45:00",
                "updated_at" => "2024-08-27 10:45:00"
            ]
        ];

        foreach ($products as &$item) {
            $item['harga_diskon'] = $item['price'] - ($item['price'] * $item['diskon']);
        }

        // return view("admin.kategori", compact("kategori"));
        // return view("admin.kategori")->with("kategori", $kategori)->with("produk", $produk);
        return view("admin.kategori", [
            "categories" => $categories,
            "products" => $products
        ]);
    }
}
