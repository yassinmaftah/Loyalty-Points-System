<?php

namespace App\Models;

class Cart
{
    public function __construct(){if (!isset($_SESSION['cart'])) {$_SESSION['cart'] = [];}}

    public function add($id, $name, $price, $qty)
    {
        if (isset($_SESSION['cart'][$id]))
            $_SESSION['cart'][$id]['qty'] += $qty; 
        else 
            $_SESSION['cart'][$id] = ['id' => $id,'name' => $name,'price' => $price,'qty' => $qty];
    }
    
    public function getItems(){return $_SESSION['cart'];}
    public function getTotal()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) 
        {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }
    public function getQty()
    {
        $total_qty = 0;
        foreach ($_SESSION['cart'] as $item)
        {
            $total_qty += $item['qty'];
        }
        return $total_qty;
    }
}