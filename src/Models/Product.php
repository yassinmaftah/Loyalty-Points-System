<?php

namespace App\Models;

class Product
{
    public function getAll()
    {
        return [
        1 => ['id' => 1, 'name' => 'Smartphone Premium', 'price' => 799.99, 'description' => 'Ecran OLED et caméra 108MP'],
        2 => ['id' => 2, 'name' => 'Casque Bluetooth', 'price' => 129.99, 'description' => 'Son haute fidélité avec réduction de bruit'],
        3 => ['id' => 3, 'name' => 'Livre PHP', 'price' => 49.99, 'description' => 'Maîtrisez PHP 8 et le MVC'],
        4 => ['id' => 4, 'name' => 'Laptop Pro 14', 'price' => 1200.00, 'description' => 'Processeur M2, 16GB RAM'],
        5 => ['id' => 5, 'name' => 'Souris Gaming', 'price' => 59.90, 'description' => 'RGB 16000 DPI sans fil'],
        6 => ['id' => 6, 'name' => 'Clavier Mécanique', 'price' => 89.00, 'description' => 'Switches Red ultra-réactifs'],
        7 => ['id' => 7, 'name' => 'Écran 4K 27"', 'price' => 349.99, 'description' => 'Dalle IPS, HDR10'],
        8 => ['id' => 8, 'name' => 'Disque Dur Externe 2To', 'price' => 75.00, 'description' => 'USB 3.2 haute vitesse'],
        9 => ['id' => 9, 'name' => 'Enceinte Intelligente', 'price' => 99.00, 'description' => 'Commande vocale et son 360'],
        10 => ['id' => 10, 'name' => 'Montre Connectée', 'price' => 199.50, 'description' => 'Suivi santé et GPS intégré'],
        11 => ['id' => 11, 'name' => 'Tablette Graphique', 'price' => 150.00, 'description' => '8192 niveaux de pression'],
        12 => ['id' => 12, 'name' => 'Appareil Photo Reflex', 'price' => 850.00, 'description' => 'Capteur plein format 24MP'],
        13 => ['id' => 13, 'name' => 'Console de Jeux NextGen', 'price' => 499.00, 'description' => 'Expérience 4K à 120 FPS'],
        14 => ['id' => 14, 'name' => 'Chaise Ergonomique', 'price' => 220.00, 'description' => 'Soutien lombaire ajustable'],
        15 => ['id' => 15, 'name' => 'Machine à Café', 'price' => 180.00, 'description' => 'Système à capsules haute pression'],
        16 => ['id' => 16, 'name' => 'Sac à Dos Laptop', 'price' => 45.00, 'description' => 'Imperméable avec port USB'],
        17 => ['id' => 17, 'name' => 'Microphone Podcast', 'price' => 110.00, 'description' => 'Condensateur cardioïde USB'],
        18 => ['id' => 18, 'name' => 'Batterie Externe 20000mAh', 'price' => 35.00, 'description' => 'Charge rapide PD 20W'],
        19 => ['id' => 20, 'name' => 'Projecteur Full HD', 'price' => 280.00, 'description' => 'Luminosité 5000 lumens'],
        20 => ['id' => 21, 'name' => 'Kit Éclairage Softbox', 'price' => 65.00, 'description' => 'Idéal pour studio photo'],
        21 => ['id' => 22, 'name' => 'Bureau Ajustable', 'price' => 320.00, 'description' => 'Électrique avec mémoire de hauteur'],
        22 => ['id' => 23, 'name' => 'Webcam 1080p 60FPS', 'price' => 79.99, 'description' => 'Auto-focus et double micro'],
        23 => ['id' => 24, 'name' => 'Aspirateur Robot', 'price' => 250.00, 'description' => 'Cartographie laser intelligente'],
        24 => ['id' => 25, 'name' => 'Tapis de Souris XXL', 'price' => 19.90, 'description' => 'Surface micro-texturée'],
        25 => ['id' => 26, 'name' => 'Câble HDMI 2.1 3m', 'price' => 15.00, 'description' => 'Supporte 8K et eARC'],
        26 => ['id' => 27, 'name' => 'Ventilateur USB Bureau', 'price' => 12.50, 'description' => 'Silencieux et orientable'],
        27 => ['id' => 28, 'name' => 'Support Laptop Alu', 'price' => 29.00, 'description' => 'Pliable et ultra-léger']
    ];
    }
    
}