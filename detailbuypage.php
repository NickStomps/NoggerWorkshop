<?php include("database.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workshop";

$conn = new mysqli($servername, $username, $password, $dbname);

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);

parse_str($url_components['query'], $params);

$array = getFietsDetails($conn, $params["id"]);
$images = getFietsImages($conn, $array["images"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail pagina</title>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="product.html">Products</a></li>
                <li><a href="reparatie.html">Repairs</a></li>
                <li><a href="mandje.html">Winkelmandje</a></li>
            </ul>
        </nav>
        <div class="user-profile"><a href="login.html">User</a></div>
    </header>

<main>
    <!-- Slideshow container -->
<div class="slideshow-container">

    <h1><?php echo $array['naam'];?></h1>
    <?php
        $i = 1;
        foreach($images as $image) {
            echo "<div class='mySlides fade'>";
            echo "<div class='numbertext'>" . $i . " / " . count($images) . "</div>";
            echo "<img src='" . $image . "' style='width:100%'>";
            echo "<h3 class='text'>€" . $array["prijs"] . "</h3>";
            echo "</div>";
            $i++;
        }
    ?>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
  
    <div class="details">
        <div class="purchase">
            <select>
                <option>Kopen</option>
                <option>Huren</option>
            </select>
            <button>Add to Cart</button>
        </div>
        <div class="description">
            <p><?php echo $array["beschrijving"];?></p>
        </div>
        <div class="reviews">
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <input type="text" class="review-input" placeholder="Write a review">
        </div>
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
