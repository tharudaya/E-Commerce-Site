<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $itemid = $_POST["itemid"];
    $quantity = $_POST["quantity"];
    $userid = $_SESSION["userid"];
    $price = $_POST["Unitprice"];
   // $urlofimage = $_POST["Urlofimage"];
    $Total = $quantity*$price;
    

    $n = $_SESSION["name"];

    if (empty($_SESSION["name"])) {

        header('Location :index.php');
    }


    $username = "root";
    $password = "";
    $servername = "localhost";
    $db = "xyzcompany";


    $conn = mysqli_connect($servername, $username, $password, $db)
            or die("Unable to connect to mysql");

    $query = "INSERT INTO cart values(NULL," . $userid . "," . $itemid . "," . $quantity . "," . $Total . ",true)";

    $result = mysqli_query($conn, $query);

    if ($result) {

      // echo "Success";
      header("Location: cart.php");
    }
}
?>

