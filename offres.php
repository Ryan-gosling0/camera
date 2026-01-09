
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
        <div style="display:flex;align-items:center;gap:10px;">
            <img src="assets/img/slogo.jpg" width="200" height="200" style="border-radius:30%;">
            <span>
                Welcome <strong><?= $_SESSION['user']['prenom']; ?></strong>
            </span>
        </div>
    </div>

<div class="content">
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

</div>
</div>
