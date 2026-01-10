<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/img/slogo.jpg">
</head>
<body>
<div class="menu-toggle" onclick="toggleSidebar()">
    <div></div>
    <div></div>
    <div></div>
</div>
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
                Welcome <strong>
                    <?= $_SESSION['user']['prenom'].' '.$_SESSION['user']['nom']; ?>
                </strong>
            </span>
        </div>
        <div class="contact-details">
            <h4>numéro de téléphone: <strong>+216 58885966</strong> facebook: <strong> smartprotect</strong></h4>
            <a href="cart.php" class="view-cart-btn" style="margin-left:15px; background: #2a5298; color: white; padding: 5px 10px; border-radius: 5px;">View Cart</a>
        </div>
    </div>
     <div class="wa-chat" onclick="openWA()">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
</div>
<script>
    function openWA() {
        window.open("https://wa.me/21658885966?text=HI", "_blank");
    }
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
    }

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

    <div class="content">


    
        <div class="cards">
            
            <div class="card">
                <img src="assets/img/art.jpg" alt="">
                <h3>deivce dra chnouwa: $2500</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse laboriosam molestiae, voluptas, minus soluta sed saepe exercitationem excepturi quibusdam deserunt repudiandae delectus. Ea sint fugiat illum voluptates veniam, vitae debitis.</p>
                <button onclick="addToCart('p1', 'Device Dra China', 2500)">Add to Cart</button>
            </div>
            <div class="card">
                <img src="assets/img/kit.jpg" alt="">
                <h3>kit : 999dt</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum officiis iure neque cupiditate rerum fugiat unde, nam culpa libero, soluta corporis officia velit maxime reprehenderit nobis deserunt atque enim eaque?</p>
                <button onclick="addToCart('p2', 'Kit 999dt', 999)">Add to Cart</button>
            </div>
            <div class="card">
                <img src="assets/img/install.jpg" alt="">
                <h3>kit : 2300dt</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum officiis iure neque cupiditate rerum fugiat unde, nam culpa libero, soluta corporis officia velit maxime reprehenderit nobis deserunt atque enim eaque?</p>
                <button onclick="addToCart('p3', 'Kit 2300dt', 2300)">Add to Cart</button>
            </div>
            

        </div><br>
           <div class="card">
                                <a href="offres.php"><h3>Clicker ici pour voir tous les offres</h3></a>
                                <div class="slider">
                                        <img id="mainImage" class="show" src="assets/img/offre.jpg" alt="">
                                        <img id="nextImage" src="assets/img/kit.jpg" alt="">
                                </div>
                                <h3>installation complete de cameras de surveillance et systeme d'alarme 24/7 maintenance gratuite : 2300dt</h3>
                                <a href="contacts.php"><button>contact</button></a>
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
                
            </div>

            <div class="cards" style="margin-top:40px;">
                <div class="card">
                <img src="assets/img/install.jpg" alt="">
                <h3>kit : 2300dt</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum officiis iure neque cupiditate rerum fugiat unde, nam culpa libero, soluta corporis officia velit maxime reprehenderit nobis deserunt atque enim eaque?</p>
                <img src="assets/img/install.jpg" alt="">
                <h3>kit : 2300dt</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum officiis iure neque cupiditate rerum fugiat unde, nam culpa libero, soluta corporis officia velit maxime reprehenderit nobis deserunt atque enim eaque?</p>
                <button onclick="addToCart('p3', 'Kit 2300dt', 2300)">Add to Cart</button>
                </div>

                <div class="card">
                <img src="assets/img/install.jpg" alt="">
                <h3>kit : 2300dt</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum officiis iure neque cupiditate rerum fugiat unde, nam culpa libero, soluta corporis officia velit maxime reprehenderit nobis deserunt atque enim eaque?</p>
                <button onclick="addToCart('p3', 'Kit 2300dt', 2300)">Add to Cart</button>
                </div>
                <div class="card">
                <img src="assets/img/install.jpg" alt="">
                <h3>kit : 2300dt</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum officiis iure neque cupiditate rerum fugiat unde, nam culpa libero, soluta corporis officia velit maxime reprehenderit nobis deserunt atque enim eaque?</p>
                <button onclick="addToCart('p3', 'Kit 2300dt', 2300)">Add to Cart</button>
                </div>
            </div>

    </div>
</div>
