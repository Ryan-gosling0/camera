<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/img/slogo.jpg">
</head>
<body>
    <div class="sidebar">
        <h2>SmartProtect</h2>
        <a href="dashboard.php">camera surveillance</a>
        <a href="tasks.php">alarme</a>
        <a href="contacts.php">Contacts</a>
        <a href="offres.php">Offers</a>
        <a href="devis.php">Commander</a>
    </div>

    <!-- Mobile Menu Toggle -->
    <div class="menu-toggle" onclick="toggleSidebar()">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="user-info">
                <img src="assets/img/slogo.jpg" class="user-avatar" alt="User Avatar">
                <span>Welcome <strong><?= $_SESSION['user']['prenom']; ?></strong></span>
            </div>
            <a href="dashboard.php" style="margin-left: auto;">Back to Shop</a>
        </div>

        <div class="content">
            <h2>Your Shopping Cart</h2>
            <div class="cart-container" style="background:#fff; padding:20px; border-radius:10px;">
                <?php if (empty($_SESSION['cart'])): ?>
                    <p>Your cart is empty.</p>
                    <a href="dashboard.php"><button>Start Shopping</button></a>
                <?php else: ?>
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $grand_total = 0;
                            foreach ($_SESSION['cart'] as $item): 
                                $total = $item['price'] * $item['quantity'];
                                $grand_total += $total;
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= $item['price'] ?> dt</td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= $total ?> dt</td>
                                <td>
                                    <button class="remove-btn" onclick="removeFromCart('<?= $item['id'] ?>')" style="background:#ff4444; padding:5px 10px;">Remove</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div style="margin-top:20px; text-align:right;">
                        <h3>Total: <?= $grand_total ?> dt</h3>
                        <a href="devis.php"><button style="background:#28a745;">Proceed to Checkout</button></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
    }

    function removeFromCart(id) {
        if(!confirm('Are you sure?')) return;
        const formData = new FormData();
        formData.append('action', 'remove');
        formData.append('id', id);

        fetch('cart_actions.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                location.reload();
            }
        });
    }
    </script>
</body>
</html>
