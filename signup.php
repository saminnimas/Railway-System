<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway</title>
    <link rel="stylesheet" href="assets/sign.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="#">Railway</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </div>
    </nav>
    <div class="form-container">
        <div class="inner-container">
            <div class="title"><b>Check Available Trains</b></div>
            <form action="" method="post">
                <div class="selected">
                    <div class="selected-op">
                        <span class="drname">Name</span>
                        <input type="text" id="name" name="sname" placeholder="Enter your name:" required>
                    </div>

                    <div class="selected-op">
                        <span class="drname">Username</span>
                        <input type="text" id="username" name="susername" placeholder="Enter your username:" required>
                    </div>

                    <div class="selected-op">
                        <span class="drname">Email</span>
                        <input type="email" id="email" name="semail" placeholder="Enter your email:" required>
                    </div>

                    <div class="selected-op">
                        <span class="drname">Password</span>
                        <input type="password" id="password" name="spassword" placeholder="Enter your password:" required>
                    </div>

                    <div class="selected-op">
                        <span class="drname">Phone Number</span>
                        <input type="tel" id="phone" name="sphone" pattern="[0-9]{11}"
                            placeholder="Enter 11-digit phone number" required>
                    </div>

                    <div class="selected-op">
                        <span class="drname">Re-enter Password</span>
                        <input type="password" id="confirmPassword" name="sconfirmPassword"
                        placeholder="Enter your  password again:" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Sign Up" onclick="myFunction()">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
require_once('dbconnect.php');
if(isset($_POST['sname']) && isset($_POST['semail']) && isset($_POST['sphone']) && isset($_POST['susername']) && isset($_POST['spassword']) && isset($_POST['sconfirmPassword'])){
	$name = $_POST['sname'];
	$email = $_POST['semail'];
	$phone = $_POST['sphone'];
	$username = $_POST['susername'];
	$pass = $_POST['spassword'];
	$c_pass = $_POST['sconfirmPassword'];

    if($pass != $c_pass){
        ?>
        <script>
        window.location.href = "log.php";
        </script>
        <?php
    }
    else{
        $sql = "INSERT INTO user VALUES( '$username', '$pass', '$email', '$name', '$phone', 'user' )";
        $rewards_entry = "INSERT INTO rewards VALUES('$username', '0', '0')";
        $result = mysqli_query($conn, $sql);
        $insert_into_rewards = mysqli_query($conn, $rewards_entry);
        
        if(mysqli_affected_rows($conn)){
            ?>
            <script>
            function myFunction() {
            alert("Registration successful");
            }
            window.location.href = "login.php";
            </script>
            <?php
        }
        else{
            header("Location: #");
        }
        mysqli_close($conn);
    }
}
?>