<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log-In Page</title>
    <link rel="stylesheet" href="../SystemUpdate3/css/style-login.css">
</head>

<body>
    <div class="container">
        <div class="center">
            <section id="LogIn">

                <form action="includes/login-inc.php" method="post">
                    <img src="bg/poso.jpeg" class="image1">
                    <h2>LOG IN</h2>
                    <div class="form-group">
                        <input type="text" id="uid" name="uid" placeholder="Username or Email" required> <br>
                        <input type="password" id="pwd" name="pwd" placeholder="Password" required> <br>
                        <button type="submit" id="submit" name="submit">Log In</button>
                    </div>
                </form>

                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo "<p>Fill in all fields!</p>";
                    }
                    else if($_GET["error"] == "wronglogin"){
                        echo "<p>Incorrect login information!</p>";
                    }
                }
            ?>

            </section>
        </div>

    </div>


</body>

</html>
