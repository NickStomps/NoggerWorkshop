<?php include 'database.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noggerworkshop";

$conn = new mysqli($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="logo">
            <img src="images/logo.avif" alt="">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search">
            <button>Search</button>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php" class="nav-hover">Home</a></li>
                <li><a href="product.php" class="nav-hover">Products</a></li>
                <li><a href="reparatie.html" class="nav-hover">Repairs</a></li>
                <li><a href="mandje.html" class="nav-hover">Winkelmandje</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="product-grid">
            <?php getFietsen($conn); ?>
        </div>
    </main>

    <footer>
        <ul class="nav-links">
            <li class="footer-contact nav-hover"><a href="#">contact</a></li>
            <li class="footer-address nav-hover"><a href="#">adres</a></li>
            <li class="footer-info nav-hover"><a href="#">info</a></li>
        </ul>
    </footer>
    <script src="script.js"></script>
</body>

</html>