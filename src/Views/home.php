<?php if (isset($_SESSION['user_name'])): ?>
    <h1>Hello <?= $_SESSION['user_name']; ?></h1>
    <p>You are logged in.</p>
    <a href="/Loyalty-Points-System/public/logout">Logout</a>
<?php else: ?>
    <h1>Welcome Visitor</h1>
    <a href="/Loyalty-Points-System/public/login">Login</a>
<?php endif; ?>