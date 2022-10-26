<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- This is the style for the header -->
    <link rel="stylesheet" href="../SystemUpdate3/css/style-Header.css">

    <!-- This is just a font that we'll be using. You can remove lines 12-14 if you don't want to use Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <!-- Start of the header -->
    <header>
        <div class="inner">
            <div class="CITO_logo">
                <div>
                    <!-- The below line can be an image or a h1, either will work -->
                    <a href="../SystemUpdate3/admin_header.php">
                        <img class="logo" src="bg/citoo.png" alt="logo">
                    </a>

                </div>
            </div>

            <nav>
                <!-- Each of the below lines look complicated. There is a reason for this markup though!
                <li> tag will be the container for the table.
                <span> will be the part that centers the content inside it
                <a> is the actual clickable part -->
                <li><span><a href="../SystemUpdate3/admin_signup.php">Sign Up</a></span></li>
                <li><span><a href="../SystemUpdate3/admin_search.php">Search</a></span></li>
                <li><span><a href="../SystemUpdate3/admin_report.php">Report</a></span></li>
                <li><span><a href="../SystemUpdate3/admin_delete.php">Delete</a></span></li>
                <?php
                    if(isset($_SESSION["useruid"])){ // usersUsername in users database
                        echo "<li><span><a href='includes/logout-inc.php' class='button' style='background-color:#ff0000'>Log out</a></span></li>"; // log-out button
                    }else{
                        header("location: ../SystemUpdate3/login.php");
                        exit();
                    }
                ?>
                <!-- <li><span><a href="" class="button">Log out</a></span></li> -->
                <!-- On the line above, remove the class="button" if you don't want the final
                element to be a button -->
            </nav>
        </div>
    </header>
    <!-- End of the header -->
    <div style="position:absolute; left:50px; top: 105px; font-weight: bolder;">
        <?php
            if(isset($_SESSION["useruid"])){ // usersUsername in users database
                echo "ADMIN: " . $_SESSION["username"]; // usersName in users database
            }else{
                header("location: ../SystemUpdate3/login.php");
                exit();
            }
        ?>
    </div>
</body>

</html>
