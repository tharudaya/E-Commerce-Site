<style>


    .h1{

        color: white;
        background-color:green;
        height: 70px;
        font-size: 50px;
        text-align: center;
    }

    .tbl{

        text-align: center;
        margin-left: 80px;
    }

</style>


<html>
    <body>
     <br>
        <h1 class="h1">E-Shopping Center</h1>

        <?php
        session_start();
        ?>

        <?php
        $n = $_SESSION["name"];
        $userid = $_SESSION["userid"];
        
        echo "<br>" . "WELCOME :" . " " . $n;

        if (empty($_SESSION["name"])) {

            header('Location :index.php');
        }

        $username = "root";
        $password = "";
        $servername = "localhost";
        $db = "xyzcompany";

        $conn = mysqli_connect($servername, $username, $password, $db)
                or die("Unable to connect to mysql");

        $query = "SELECT * FROM item";


        $result = mysqli_query($conn, $query);
        ?>

        <table class="tbl">

            <?php
            while ($row = mysqli_fetch_array($result)) {


                echo "<tr>";
                echo "<td>" . $row["Name"] . "</td>" . "<td>" . "<img src=" . $row["Urlofimage"] . "></img>" . "</td>";
                echo "<td><a href=item.php?id=" .$row["id"] . ">View More Details</td>";
                echo "</tr>";
            }
            ?>

        </table>
    </body>

</html>
