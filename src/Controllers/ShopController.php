<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Exception;

class ShopController
{
    private $twig;
    private $cart;
    public function __construct($twig)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /Loyalty-Points-System/login');
            exit;
        }
        $this->twig = $twig;
        $this->cart = new Cart();
    }

    public function ShoP_Page()
    {
        $productModel = new Product();
        $products = $productModel->getAll();
        echo $this->twig->render('shop/ShopPage.html.twig', ['products' => $products, 'user' => $_SESSION['user']]);
    }

    public function add()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $this->cart->add($id, $name, $price, $qty);
        header('Location: /Loyalty-Points-System/shop');
        exit;
    }

    public function viewCart()
    {
        $total = $this->cart->getTotal();
        $points = floor($total / 100) * 10;
        echo $this->twig->render('shop/cart.html.twig', [
            'items' => $this->cart->getItems(),
            'total' => $total,
            'points' => $points,
            'user' => $_SESSION['user']
        ]);
    }

    public function checkout()
    {
        $total = $this->cart->getTotal();
        $pointsToEarn = floor($total / 100) * 10;
        $userModel = new \App\Models\User();

        $newTotalPoints = $_SESSION['user']['loyalty_points'] + $pointsToEarn;

        $db = (new \App\Core\Database())->connect();
        $sql = "UPDATE users SET total_points = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$newTotalPoints, $_SESSION['user']['id']]);

        $sql1 = "INSERT INTO points_transactions (user_id, type, amount, description, balance_after) 
                    VALUES (?, 'earned', ?, ?, ?)";
        // $product = $_SESSION['card']['name'];
        $cardModel = (new \App\Models\Cart);
        $totalQty = $cardModel->getQty();
        $desc = "You buying $totalQty Product";
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute([$_SESSION['user']['id'], $pointsToEarn, $desc, $newTotalPoints]);

        $_SESSION['user']['loyalty_points'] = $newTotalPoints;
        unset($_SESSION['cart']);
        echo "Purchase successful! You earned " . $pointsToEarn . " points.";
        echo "<br><a href='/Loyalty-Points-System/shop'>Go back to Shop</a>";
    }
    public function showRewards()
    {
        $rewardModel = new \App\Models\Reward();
        $rewards = $rewardModel->getAll();
        echo $this->twig->render('shop/rewards.html.twig', ['rewards' => $rewards, 'user' => $_SESSION['user']]);
    }
    // public function redeemPoints()
    // {
    //     $rewardId = $_POST['reward_id'];
    //     $rewardModel = new \App\Models\Reward();
    //     $reward = $rewardModel->getById($rewardId);
    //     if (!($_SESSION['user']['loyalty_points'] < $reward['points_required'])) {
    //         $newBalance = $_SESSION['user']['loyalty_points'] - $reward['points_required'];

    //         $db = (new \App\Core\Database())->connect();
    //         $sqlUser = "UPDATE users SET total_points = ? WHERE id = ?";
    //         $stmt = $db->prepare($sqlUser);
    //         $stmt->execute([$newBalance, $_SESSION['user']['id']]);

    //         $sqlTrans = "INSERT INTO points_transactions (user_id, type, amount, description, balance_after) 
    //                     VALUES (?, 'redeemed', ?, ?, ?)";
    //         $desc = "Échange : " . $reward['name'];
    //         $stmt1 = $db->prepare($sqlTrans);
    //         $stmt1->execute([$_SESSION['user']['id'], $reward['points_required'], $desc, $newBalance]);
    //         $_SESSION['user']['loyalty_points'] = $newBalance;
    //         echo "Succès ! Vous avez obtenu " . $reward['name'];
    //     }
    //     echo "<br><a href='/Loyalty-Points-System/rewards'>Back to rewards</a>";
    // }

public function redeemPoints()
{
    $database = new \App\Core\Database();
    $db = $database->connect();

    try {
        $db->beginTransaction();

        $rewardId = $_POST['reward_id'];
        $rewardModel = new \App\Models\Reward();
        $reward = $rewardModel->getById($rewardId);

        if ($_SESSION['user']['loyalty_points'] < $reward['points_required']) {
            throw new Exception("Error: You don't have enough points for this reward.");
        }

        $newBalance = $_SESSION['user']['loyalty_points'] - $reward['points_required'];

        $sqlUser = "UPDATE users SET total_points = ? WHERE id = ?";
        $stmt = $db->prepare($sqlUser);
        $stmt->execute([$newBalance, $_SESSION['user']['id']]);

        $sqlTrans = "INSERT INTO points_transactions (user_id, type, amount, description, balance_after) 
                     VALUES (?, 'redeemed', ?, ?, ?)";
        $desc = "Échange : " . $reward['name'];
        $stmt1 = $db->prepare($sqlTrans);
        $stmt1->execute([$_SESSION['user']['id'], $reward['points_required'], $desc,$newBalance]);

        $_SESSION['user']['loyalty_points'] = $newBalance;

        $db->commit();
        
        echo "Success! You obtained: " . $reward['name'];
        echo "<br><a href='/Loyalty-Points-System/rewards'>Back to rewards</a>";

    } catch (Exception $e) {
        if ($db->inTransaction())
            $db->rollBack();
        echo "Transaction Failed: " . $e->getMessage();
    }
}
    public function history()
    {
        $db = (new \App\Core\Database())->connect();
        $sql = "SELECT * FROM points_transactions WHERE user_id = ? ORDER BY createdat DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['user']['id']]);
        $transactions = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        echo $this->twig->render('shop/history.html.twig', ['transactions' => $transactions, 'user' => $_SESSION['user']]);
    }
}
