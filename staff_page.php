<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>Visitor's LogBook System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../SystemUpdate3/css/style-staff_page.css">
    <link rel="stylesheet" type="text/css" href="../SystemUpdate3/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../SystemUpdate3/bootstrap/bootstrap-select.min.css">

</head>

<body>

    <div class="container ">

        <!--Log-In Staff Account-->
        <div class="">
            <div style="font-weight: bolder;">
                <?php
                if(isset($_SESSION["useruid"])){ // usersUsername in users database
                    echo "Staff: " . $_SESSION["username"]; // usersName in users database
                }else{
                    header("location: ../SystemUpdate3/login.php");
                    exit();
                }
            ?>
            </div>
        </div>

        <!--Log-Out Button-->
        <div style="position:absolute; left:1066px; top: 30px; font-weight: bolder;">
            <?php
                if(isset($_SESSION["useruid"])){ // usersUsername in users database
//                    echo "<a href='includes/logout-inc.php'> <input type='submit' value='Log out'></input> </a>"; // log-out button
                    echo  "<a style='color: #ff0000' href='includes/logout-inc.php'>Logout</a>";
                }else{
                    header("location: ../SystemUpdate3/login.php");
                    exit();
                }
            ?>
        </div>

        <form method="post" action="function/function-staff_page.php">
            <h1>VISITOR'S LOGBOOK SYSTEM</h1>


            <!--Department-->
            <div class="form-group search_select_box">
                <label class="control-label col-sm-4" for="Department">
                    <p class="p1">Department:</p>
                </label>
                <!--Drop down search-->
                <div class="col-sm-2">
                    <select data-live-search="true" name='Department' id="Department">
                        <!--Building A-->
                        <optgroup label="Building A">
                            <option value="ABC">ABC</option>
                            <option value="ACCOUNTING">ACCOUNTING</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="ASSESSOR">ASSESSOR</option>
                            <option value="BAC">BAC</option>
                            <option value="B-CLUB">B-CLUB</option>
                            <option value="BPLO">BPLO</option>
                            <option value="BUDGET">BUDGET</option>
                            <option value="CITO">CITO</option>
                            <option value="CENRO">CENRO</option>
                            <option value="CLEAN&GREEN">CLEAN&amp;GREEN</option>
                            <option value="COOP">COOP</option>
                            <option value="COUNCILOR">COUNCILOR</option>
                            <option value="CUDHO">CUDHO</option>
                            <option value="GSO">GSO</option>
                            <option value="HR">HR</option>
                            <option value="LEGAL">LEGAL</option>
                            <option value="MIAU">MIAU</option>
                            <option value="MO">MO</option>
                            <option value="OBO">OBO</option>
                            <option value="PLANNING">PLANNING</option>
                            <option value="POSO">POSO</option>
                            <option value="SCHOLAR">SCHOLAR</option>
                            <option value="SCREA">SCREA</option>
                            <option value="SK">SK</option>
                            <option value="SP">SP</option>
                            <option value="TREASURY">TREASURY</option>
                            <option value="VM">VM</option>
                        </optgroup>
                        <!--Building B-->
                        <optgroup label="Building B">
                            <option value="AGRI">AGRI</option>
                            <option value="AUDITORIUM">AUDITORIUM</option>
                            <option value="CHO1">CHO1</option>
                            <option value="CIO">CIO</option>
                            <option value="COA">COA</option>
                            <option value="CSWD">CSWD</option>
                            <option value="DILG">DILG</option>
                            <option value="ENG'G">ENG'G</option>
                            <option value="OSCA">OSCA</option>
                            <option value="PESO">PESO</option>
                            <option value="P.HEALTH">P.HEALTH</option>
                            <option value="REGISTRAR">REGISTRAR</option>
                            <option value="VET">VET</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            <!--Full Name & Textbox-->
            <div class="form-group">
                <label class="control-label col-sm-4">
                    <p class="p1">Name:</p>
                </label>
                <div class="col-sm-4 input-center">
                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" required>
                </div>
            </div>

            <!--Gender-->
            <div class="form-group">
                <label class="control-label col-sm-4" for="Gender">
                    <p class="p1">Gender:</p>
                </label>
                <!--Radio Button-->
                <div class="col-sm-4">
                    <label class="radio-inline col-sm-4">
                        <input type="radio" id="optradio" name="optradio" value="Female" required>Female
                    </label>
                    <label class="radio-inline col-sm-4">
                        <input type="radio" id="optradio" name="optradio" value="Male" required>Male
                    </label>
                </div>
            </div>

            <!--Address & Textbox-->
            <div class="form-group">
                <label class="control-label col-sm-4" for="email">
                    <p class="p1">Address:</p>
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="Address" placeholder="Enter Address" name="Address" required>
                </div>
            </div>

            <!--Contact & Textbox-->
            <div class="form-group">
                <label class="control-label col-sm-4" for="Contact">
                    <p class="p1">Contact:</p>
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="Contact" placeholder="Enter Contact" name="Contact" required>
                </div>
            </div>

            <!--Submit Button-->
            <div class="form-group">
                <div class="btn_center">
                    <button type="submit" class="button">Save</button>
                </div>
            </div>
        </form>
    </div>

    <script src="../SystemUpdate3/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../SystemUpdate3/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../SystemUpdate3/js/popper.min.js"></script>
    <script src="../SystemUpdate3/js/bootstrap.min.js"></script>
    <script src="../SystemUpdate3/js/bootstrap-select.min.js"></script>
    <script src="../SystemUpdate3/js/script.js"></script>

</body>

</html>
