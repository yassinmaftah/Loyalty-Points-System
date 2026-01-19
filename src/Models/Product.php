<?php

namespace App\Models;

class Product
{
    public function getAll()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Smartphone Premium',
                'price' => 799.99,
                'description' => 'Ecran OLED et caméra 108MP'
            ],
            2 => [
                'id' => 2,
                'name' => 'Casque Bluetooth',
                'price' => 129.99,
                'description' => 'Son haute fidélité avec réduction de bruit'
            ],
            3 => [
                'id' => 3,
                'name' => 'Livre PHP',
                'price' => 49.99,
                'description' => 'Maîtrisez PHP 8 et le MVC'
            ]
        ];
    }
    
}