<style>

    .form_1 {
        border: 3px solid #f1f1f1;
        text-align: center;
        width: 50%;
        height: 450px;
        margin-left: 340px;
        margin-top: 50px;
    }

    /* Full-width inputs */
    .container input {
        width: 90%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-top: 20px;
        margin-right: 50px;
    }

    /* Set a style for all buttons */
    button {
        background-color: green;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 90%;
        margin-right: 50px;

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



    table{

        text-align: center;
        width: 100%;
    }

</style>

<html>
    <body>

        <br>
        <h1 class="h1">E-Shopping Registration</h1>
        <form class="form_1" action="register.php" method="post">

            <div class="container">


                <table class="table">

                    <tr>
                        <td>Username</td>
                        <td><input type="text" placeholder="Enter Username" name="uname" required></td>                   
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><input type="password" placeholder="Enter Password" name="psw" required></td>                   
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td><input type="text" placeholder="Enter Address" name="address" required></td>                   
                    </tr>

                    <tr>
                        <td>Telephone</td>
                        <td><input type="tel" placeholder="Enter Phone Number" name="telephone" required></td>                   
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><input type="email" placeholder="Enter Email" name="email" required></td>                   
                    </tr>

                    <tr>
                        <td></td>
                        <td><button type="submit">Register</button></td>                   
                    </tr>

                </table>      

        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = $_POST["uname"];
            $password = $_POST["psw"];
            $address = $_POST["address"];
            $telephone = $_POST["telephone"];
            $email = $_POST["email"];

            $query = "INSERT INTO user values(NULL,'$name','$password','$address','$telephone','$email')";

            $username = "root";
            $password = "";
            $servername = "localhost";
            $db = "xyzcompany";

            $conn = mysqli_connect($servername, $username, $password, $db)
                    or die("Unable to connect to mysql");

            $result = mysqli_query($conn, $query);

            if ($result) {

                echo "Successfully Registered";
                header("Location: index.php");
            } else {

                echo "Failed to Registered";
            }

            mysqli_close($conn);
        }
        ?>

    </body>
</html> 


