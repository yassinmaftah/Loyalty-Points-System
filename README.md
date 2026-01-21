# 🌟 Loyalty Points System (LoyaltyPro)

LoyaltyPro is a modern, high-performance web application designed to manage customer loyalty through a points-based ecosystem. Users earn points by purchasing products and can redeem them for exclusive rewards through an interactive, real-time interface.



## 🚀 Key Features

* **Custom MVC Architecture**: Built from scratch using a clean Model-View-Controller pattern for better scalability and maintenance.
* **Secure Authentication**: Full user lifecycle management including Signup, Login, and Session-based security.
* **Dynamic Product Catalog**: An expansive grid of 25+ products with intelligent icon categorization.
* **Real-time Rewards Redemption**: Interactive point exchange system powered by **AJAX (Fetch API)** and **SweetAlert2** popups for a seamless UX.
* **Comprehensive Points History**: A detailed ledger of all "Earned" and "Redeemed" transactions with dynamic status badges.
* **Modern Responsive UI**: Crafted with native CSS using Flexbox/Grid, Inter typography, and a "Mobile-first" approach.

## 🛠️ Tech Stack

* **Backend**: PHP 8.x (Vanilla / Custom MVC)
* **Database**: MySQL with **PDO** (Prepared Statements for SQL Injection protection)
* **Templating**: **Twig** (Template Inheritance and clean syntax)
* **Frontend**: Native CSS3, Font Awesome 6
* **Notifications**: SweetAlert2 for interactive feedback

## 📦 Installation & Setup

1. **Clone the repository**:
   ```bash
   git clone [https://github.com/yassinmaftah/Loyalty-Points-System.git]
Configure the Database:

Create a database named loyaltypointssystem.
Import the provided .sql schema (if available).
Update your credentials in App/Core/Database.php.

Apache Configuration: Ensure mod_rewrite is enabled to support custom routing via the Router.php engine.

📁 Project Structure
Plaintext

├── App/
│   ├── Controllers/    # Application logic (Auth, Shop, etc.)
│   ├── Core/           # Router, Database, and MVC Engine
│   └── Models/         # Data handling & Business rules
├── public/
│   └── css/            # Modern CSS stylesheets
│
├── views/              # Twig templates (.html.twig)
└── index.php           # Front Controller / Entry point
🛡️ Security Best Practices
SQL Protection: Utilizes PDO prepared statements for all database queries.
Session Management: Secure user sessions with protected routes.
Input Validation: Clean handling of POST data for registration and point transactions.

Developed with ❤️ by Yassine Maftah - YouCode