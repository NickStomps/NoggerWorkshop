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
function getFietsDetails($fiets)
{
    // Implement function logic here
}

// Function to fetch and display fietsen
function getFietsen($conn)
{
    $sql = "SELECT naam, prijs, img_path FROM `fiets`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $naam = $row["naam"];
            $prijs = $row["prijs"];
            $img_path = $row["img_path"];
            echo "<div class='card'>";
            echo "<img class='card-image' src='" . $img_path . "'>";
            echo "<div class='card-title'>" . $naam . "</div>";
            echo "<div class='card-price'>€" . $prijs . "</div>";
            echo "</div>";
        }
    } else {
        echo "No fietsen found.";
    }
}

// Close the connection
$conn->close();
?>
