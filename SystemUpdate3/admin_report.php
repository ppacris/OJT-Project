<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
        include_once 'admin_header.php'
    ?>

    <!--   Style Table-->
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!--   JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>


    <!--   Buttons-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <!--   CSS-->
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
        .container {
            margin: auto;
            padding-top: 50px;
            padding-left: 50px;
            padding-right: 50px;
            width: 95%;
            height: 100%;
            background: whitesmoke;
            border-radius: 4px;
            box-shadow: 1px 2px 5px #000000;
            position: relative;
            min-height: 95vh;
        }
        body{
/*            background: linear-gradient(to left top, #ab96ec, #ec3c89 );*/
            background: linear-gradient(to left top, #b15771, #e6144f );
            background-repeat: no-repeat;
             background-size:auto;
            overflow-x: hidden; /* Hide horizontal scrollbar */
            
        }


    </style>

</head>

<body>
    <div class="container">
        <h2 style="text-align: center; font-family: Georgia, Times, serif;;">PRINT REPORT</h2>
        <table border="0" cellspacing="5" cellpadding="5" id="test">
            <tbody>
                <tr>
                    <td><h4><strong style="font-family: Arial, Helvetica, sans-serif;">Minimum date:</strong></h4></td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>
                <tr>
                    <td><h4><strong style="font-family: Arial, Helvetica, sans-serif;">Maximum date:</strong></h4></td>
                    <td><input type="text" id="max" name="max"></td>
                </tr>
            </tbody>
        </table>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Date/Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "visitorlogbooksystem");
                    $sqlquery = "SELECT * FROM visitorsloginfo";
                    $result = $conn->query($sqlquery);
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?= $row['Department'] ?></td>
                    <td><?= $row['Name'] ?></td>
                    <td><?= $row['Gender'] ?></td>
                    <td><?= $row['Address'] ?></td>
                    <td><?= $row['Contact'] ?></td>
                    <td><?= $row['Date_time'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<script>
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[5]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'YYYY MMMM Do'
        });
        maxDate = new DateTime($('#max'), {
            format: 'YYYY MMMM Do'
        });

        // DataTables initialisation
        var table = $('#example').DataTable();

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });

        new $.fn.dataTable.Buttons(table, {
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });

        table.buttons().container()
            .appendTo($('#example_length', table.table().container()));
    });

</script>

