<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}
?>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="icon" type="image/x-icon" href="assets/img/slogo.jpg">

<div class="sidebar">
    <h2>SmartProtect</h2>
    <a href="dashboard.php">camera surveillance</a>
    <a href="tasks.php">alarme</a>
    <a href="contacts.php">Contacts</a>
    <a href="offres.php">Offers</a>
    <a href="devis.php">Commander</a>
</div>

<div class="main">
    <div class="topbar">
        <div class="user-info">
            <img src="assets/img/slogo.jpg" class="user-avatar" alt="User Avatar">
            <span>
                Welcome <strong><?= $_SESSION['user']['prenom']; ?></strong>
            </span>
            <a href="cart.php" class="view-cart-btn" style="margin-left:15px; background: #2a5298; color: white; padding: 5px 10px; border-radius: 5px;">View Cart</a>
        </div>
    </div>

<div class="content">
<div class="slider">
                                        <img id="mainImage" class="show" src="assets/img/offre.jpg" alt="">
                                        <img id="nextImage" src="assets/img/kit.jpg" alt="">
                                </div>
                                <h3>installation complete de cameras de surveillance et systeme d'alarme 24/7 maintenance gratuite : 2300dt</h3>
                                <button onclick="addToCart('offer1', 'Full Installation Offer', 2300)">Add to Cart</button>
                                <script>
                                const images = ["assets/img/offre.jpg","assets/img/kit.jpg","assets/img/install.jpg"];
                                let index = 0;
                                const main = document.getElementById('mainImage');
                                const next = document.getElementById('nextImage');

                                function changeImage(){
                                    const nextIndex = (index + 1) % images.length;
                                    next.src = images[nextIndex];
                                    next.classList.add('show');
                                    main.classList.remove('show');
                                    setTimeout(()=>{
                                        main.src = images[nextIndex];
                                        main.classList.add('show');
                                        next.classList.remove('show');
                                        index = nextIndex;
                                    },1500);
                                }

                                let interval = setInterval(changeImage,5000);

                                function showImage(i){
                                    clearInterval(interval);
                                    const nextIndex = i % images.length;
                                    next.src = images[nextIndex];
                                    next.classList.add('show');
                                    main.classList.remove('show');
                                    setTimeout(()=>{
                                        main.src = images[nextIndex];
                                        main.classList.add('show');
                                        next.classList.remove('show');
                                        index = nextIndex;
                                        interval = setInterval(changeImage,5000);
                                    },1500);
                                }


                                
                                
                                </script>
                                <script>
                                    function addToCart(id, name, price) {
                                        const formData = new FormData();
                                        formData.append('action', 'add');
                                        formData.append('id', id);
                                        formData.append('name', name);
                                        formData.append('price', price);

                                        fetch('cart_actions.php', {
                                            method: 'POST',
                                            body: formData
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.status === 'success') {
                                                alert('Added to cart! Total items: ' + data.count);
                                            }
                                        });
                                    }
                                </script>
                
            </div>

</div>
</div>
