<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway</title>
    <link rel="stylesheet" href="assets/custom.css">
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
            <form action="process.php" method="post">
                <div class="selected">
                    <div class="selected-op">
                        <span class="drname">From</span>
                        <select name="from">
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Dewanganj">Dewanganj</option>
                            <option value="Khulna">Khulna</option>
                        </select>
                    </div>

                    <div class="selected-op">
                        <span class="drname">To</span>
                        <select name="to">
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Dewanganj">Dewanganj</option>
                            <option value="Khulna">Khulna</option>
                        </select>
                    </div>

                    <div class="selected-date">
                        <span class="drname">Date</span>
                        <input type="date" name="date">
                    </div>

                    <div class="selected-op">
                        <span class="train_class">Train-Class</span>
                        <select name="train_class">
                            <option value="Shovon Chair">Shovon Chair</option>
                            <option value="AC Chair">AC Chair</option>
                            <option value="AC Berth">AC Berth</option>
                            <option value="Sleeper Coach">Sleeper Coach</option>
                            <option value="First Class">First Class</option>
                        </select>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Check Status" name="status">
                </div>
                <div class="button">
                    <input type="submit" value="Buy Ticket" name="buy_t">
                </div>
            </form>
        </div>

    </div>
</body>

</html>