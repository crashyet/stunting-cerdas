<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function index(Request $req)
    {
        $foods = [
            [
                'nama' => 'Bubur Ayam Sayur',
                'kategori' => 'MPASI',
                'usia' => '6-12',
                'kalori' => 150,
                'protein' => '8g',
                'vitamin' => ['Vitamin A','Vitamin B']
            ],
            [
                'nama' => 'Telur Orak-arik Wortel',
                'kategori' => 'Sarapan',
                'usia' => '12-24',
                'kalori' => 180,
                'protein' => '12g',
                'vitamin' => ['Vitamin A','Vitamin D']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            [
                'nama' => 'Nasi Tim Ayam Brokoli',
                'kategori' => 'Makan Siang',
                'usia' => '24-60',
                'kalori' => 250,
                'protein' => '18g',
                'vitamin' => ['Vitamin C','Vitamin K']
            ],
            
        ];

        // Filter USIA
        if ($req->usia && $req->usia !== 'all') {
            $foods = array_filter($foods, fn($f) => $f['usia'] === $req->usia);
        }

        // Search makanan
        if ($req->search) {
            $foods = array_filter($foods, fn($f) =>
                str_contains(strtolower($f['nama']), strtolower($req->search))
            );
        }

        return view('users.rekomendasi', [
            'foods' => $foods
        ]);
    }
}
