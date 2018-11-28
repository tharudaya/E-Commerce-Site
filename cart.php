<style>


    .h1{

        color: white;
        background-color:green;
        height: 70px;
        font-size: 50px;
        text-align: center;

    }

    .tbl{

        margin-left: 100px;
        background-color: #bfbfbf;
        width: 15%;
        
    }
    
</style>

<html>

    <body>

        <h1 class="h1">My E-Shopping Cart</h1>

        <?php
        session_start();
        ?>

        <?php
        $userid = $_SESSION["userid"];

        $n = $_SESSION["name"];
        echo "<br>" . "UserName :" . " " . $n . "<br><br>";

        if (empty($_SESSION["name"])) {

            header('Location :index.php');
        }


        $username = "root";
        $password = "";
        $servername = "localhost";
        $db = "xyzcompany";


        $conn = mysqli_connect($servername, $username, $password, $db)
                or die("Unable to connect to mysql");

        $query = "SELECT * FROM cart where userid='$userid'";

        $result = mysqli_query($conn, $query);


        while ($row = mysqli_fetch_array($result)) {
            
            if($row["itemid"]==1){
                
                $name = "Bag";
            }else{
                
                $name = "Shoes";
            }

            echo "Date :" . date("Y/m/d");
            echo"<table class=\"tbl\">";
            echo "<tr>";
            echo "<td>Item ID :</td>" . "<td>" . $row["itemid"] . "</td></tr>";
            echo "<td>Name:</td>" . "<td>" . $name . "</td></tr>";
            echo "<tr><td>Quantity :</td>" . "<td>" . $row["quantity"] . "</td></tr>";
            echo "<tr><td>Total Cost is :</td>" . "<td>" . $row["Total"] . "</td></tr>";
            echo"</table>";

            echo "<br>";
        }
        ?>

    </body>
</html>