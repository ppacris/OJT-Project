<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign-Up Page</title>
    <link rel="stylesheet" href="../SystemUpdate3/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../SystemUpdate3/css/style-signup-admin.css">
    <?php
        include_once 'admin_header.php';
    ?>
</head>



<body>
    <div class="container">
        <div class="center">

            <section id="SignUp">
                <form action="includes/signup-inc.php" method="post">
                    <img src="bg/poso.jpeg" class="image">
                    <h2>Sign Up</h2>

                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Full name ..." required> <br>
                        <input type="text" id="email" name="email" placeholder="Email ..." required> <br>
                        <input type="text" id="uid" name="uid" placeholder="Username ..." required> <br>
                        <input type="password" id="pwd" name="pwd" placeholder="Password ..." required> <br>
                        <input type="password" id="pwdrepeat" name="pwdrepeat" placeholder="Repeat password ..." required> <br>
                        <select name="usersType" id="usersType">
                            <option value="staff">staff</option>
                            <option value="admin">admin</option>
                        </select><br>
                        <button type="submit" id="submit" name="submit">Sign Up</button>
                    </div>
                </form>



                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput") {
                            echo "<p>Fill in all fields!</p>";
                        }
                        else if($_GET["error"] == "invaliduid") {
                            echo "<p>Username Invalid!</p>";
                        }
                        else if($_GET["error"] == "InvalidEmail") {
                            echo "<p>Email Invalid!</p>";
                        }
                        else if($_GET["error"] == "Passwordsdontmatch") {
                            echo "<p>Password doesn't match!</p>";
                        }
                        else if($_GET["error"] == "stmtfailed") {
                            echo "<p>Something went wrong! try again.</p>";
                        }
                        else if($_GET["error"] == "usernametaken") {
                            echo "<p>Username already taken.</p>";
                        }
                        else if($_GET["error"] == "none") {
                            echo "<p>You have signed up!</p>";
                        }
                    }
                ?>

            </section>

        </div>
    </div>

</body>

</html>
