<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noggerworkshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
getFietsen($conn);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->connect();
function getFietsDetails($fiets)
{

}

function getFietsen($conn)
{
    $sql = "SELECT naam, prijs, img_path FROM fiets";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $naam = $row["naam"];
            $prijs = $row["prijs"];
            $img_path = $row["img_path"];

            echo "Naam: " . $naam . "<br>";
            echo "Prijs: " . $prijs . "<br>";
            echo "Image: <img style='width: 20px; height: 20px;'src='" . $img_path . "'><br>";
        }
    } else {
        echo "No fietsen found.";
    }
}