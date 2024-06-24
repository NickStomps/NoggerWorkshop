<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noggerworkshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get fiets details (to be implemented)
function getFietsDetails($conn, $fietsId)
{
    $sql = "SELECT * FROM `fiets` WHERE id = " . $fietsId . ";";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $naam = $row["naam"];
            $prijs = $row["prijs"];
            $beschikbaarheid = $row["is_beschikbaar"];
            $images = $row["images_id"];
            $beschrijving = $row["beschrijving"];
            $fietsArray = [
                "naam" => $naam,
                "prijs" => $prijs,
                "beschikbaarheid" => $beschikbaarheid,
                "images" => $images,
                "beschrijving" => $beschrijving
            ];
        }
        
        return $fietsArray;
    } 
}

// Function to fetch and display fietsen
function getFietsen($conn)
{
    $sql = "SELECT id, naam, prijs, images_id FROM `fiets`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $naam = $row["naam"];
            $prijs = $row["prijs"];
            $image = $row["images_id"];
            echo "<div class='card' id='" . $id . "'>";
            echo "<img class='card-image' src='" . getFirstImage($conn, $image) . "'>";
            echo "<div class='card-title'>" . $naam . "</div>";
            echo "<div class='card-price'>€" . $prijs . "</div>";
            echo "</div>";
        }
    }
}

function getFietsImages($conn, $imagesId)
{
    $sql = "SELECT * FROM `images` WHERE id = " . $imagesId . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image1 = $row["image1"];
            $image2 = $row["image2"];
            $image3 = $row["image3"];
            $imgArray = [
                "image1" => $image1,
                "image2" => $image2,
                "image3" => $image3
            ];
        }
        return $imgArray;
    }
}

function getFirstImage($conn, $imagesId)
{
    $sql = "SELECT `image1` FROM `images` WHERE id = " . $imagesId . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = $row["image1"];
        }
    }
    return $image;
}

// Close the connection
$conn->close();

