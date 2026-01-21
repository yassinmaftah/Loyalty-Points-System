<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private $twig;

    public function __construct($twig){$this->twig = $twig;}
    public function showSignupForm()
    {
        if (isset($_SESSION['user'])) 
        {
            header('Location: /Loyalty-Points-System/shop');
            exit;
        }
        echo $this->twig->render('auth/signup.html.twig');
    }
    public function showLoginForm()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /Loyalty-Points-System/shop');
            exit;
        }
        echo $this->twig->render('auth/login.html.twig');
    }

    public function signup()
    {
        $userModel = new User();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($userModel->register($name, $email, $password)) 
        {
            header('Location: /Loyalty-Points-System/login');
            exit;
        } else
            echo "Error during registration";
    }

    public function login()
    {
        $userModel = new User();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $userModel->login($email, $password);
        if ($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'loyalty_points' => $user['total_points']
            ];
            header('Location: /Loyalty-Points-System/shop');
            exit;
        } else {
            echo "Wrong email or password";
        }
    }

    public function home()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /Loyalty-Points-System/login');
            exit;
        }
        echo $this->twig->render('home.html.twig', ['user' => $_SESSION['user']]);
    }

    public function logout()
    {
        session_destroy();
        header('Location: /Loyalty-Points-System/login');
        exit;
    }
}