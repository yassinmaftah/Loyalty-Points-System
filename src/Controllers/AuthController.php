<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function showSignupForm() {include __DIR__ . '/../Views/signup.php';}
    public function showLoginForm() {include __DIR__ . '/../Views/login.php';}
    public function home() {include __DIR__ . '/../Views/home.php';}
    public function signup() 
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userModel = new User();
        if ($userModel->register($username, $email, $password)) {
            header('Location: /Loyalty-Points-System/login');
            exit;
        } else
            echo "Error: Could not register user.";
    }

    public function login() 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userModel = new User();
        $user = $userModel->login($email, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: /Loyalty-Points-System/home');
            exit;
        } else
            echo "Wrong email or password!";
    }
    public function logout() {
        session_destroy();
        header('Location: /Loyalty-Points-System/login');
        exit;
    }
}