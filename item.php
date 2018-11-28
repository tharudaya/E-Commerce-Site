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
    }
    
    .btn{
        
      background-color: green;  
      padding: 7px 30px;
      color: white;
    }

</style>

<html>

    <body>
        
        <br>
        <h1 class="h1">Details</h1>

        <?php
        session_start();
        ?>

        <?php

            $itemid = $_GET["id"];
                      
            $n = $_SESSION["name"];
            echo "<br>" . "UserName :" . " " . $n."<br><br>";

            if (empty($_SESSION["name"])) {

                header('Location :index.php');
            }

            $username = "root";
            $password = "";
            $servername = "localhost";
            $db = "xyzcompany";       

            $conn = mysqli_connect($servername, $username, $password, $db)
                    or die("Unable to connect to mysql");

            $query = "SELECT * FROM item where id='$itemid'";

            $result = mysqli_query($conn, $query);    
        
        ?>
        
        <form method="post" action="add.php">
            <table class="tbl">

                <?php
                                
                $row = mysqli_fetch_array($result);

                echo "<tr>";
                echo "<td>Name :</td>" . "<td>" . $row["Name"] . "</td></tr>";
                echo "<tr><td>Image :</td>" . "<td>" . "<img src=" . $row["Urlofimage"] . "></img>" . "</td><tr>";
                echo "<tr><td>Unit Price :</td>" . "<td>" . $row["Unitprice"] . "</td></tr>";
                echo "<tr><td>Quantity :</td>" . "<td>" . "<input type=\"text\" name=\"quantity\">" . "</td></tr>";
                echo "<tr><td></td>" . "<td>" . "<input type=\"submit\" value=\"Add to Cart\" class=\"btn\">" . "</td></tr>";
                
                ?>

            </table>
                       
            <input type="hidden" value="<?php echo $itemid;?>" name="itemid">
            <input type="hidden" value="<?php echo $row["Unitprice"];?>" name="Unitprice">            

        </form>

    </body>
</html>