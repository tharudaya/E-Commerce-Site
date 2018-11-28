<style>

    .form_1 {
        border: 3px solid #f1f1f1;
        text-align: center;
        width: 50%;
        height: 250px;
        margin-left: 340px;
        margin-top: 100px;
    }

    .container{

        text-align: center;
    }

    /* Full-width inputs */
    input[type=text], input[type=password] {
        width: 80%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-left: 20px;
        margin-top: 30px;
    }

    /* Set a style for all buttons */
    button {
        background-color: green;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 37%;
        margin-left: 90px;

    }


    /* Add a hover effect for buttons */
    button:hover {
        opacity: 0.8;
    }

    .h1{

        color: white;
        background-color:green;
        height: 70px;
        font-size: 50px;
        text-align: center;

    }
    .reg{

        background-color: green;
        color: white;
        padding: 13px 100px;
        border: none;
        cursor: pointer;
        width: 400px;
        margin-lef: 500px;
        text-decoration: none;

    }
    
    .reg:hover {
        opacity: 0.8;
    }

</style>

<html>
    <body>

        <br>
        <h1 class="h1">E-Shopping Center</h1>
        <form class="form_1" action="index.php" method="post">

            <div class="container">

                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required><br

                    <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <br>  <button class="btn" type="submit">Login</button>

             </form>
        <a href="register.php" class="reg">Register</a><br></div>


        <?php
        session_start();
        ?>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = $_POST["uname"];
            $pass = $_POST["psw"];

            $_SESSION["name"] = $name;

            $username = "root";
            $password = "";
            $servername = "localhost";
            $db = "xyzcompany";


            $conn = mysqli_connect($servername, $username, $password, $db)
                    or die("Unable to connect to mysql");

            $query = "SELECT * FROM user where Name='$name'";

            $result = mysqli_query($conn, $query);

            $row = mysqli_fetch_array($result);


            if ($row{'Password'} == $pass) {

                header("Location: welcome.php");
            } else {

                echo "username or password is incorrect";
            }

            $_SESSION["userid"] = $row["id"];
        }
        ?>


    </body>
</html> 

