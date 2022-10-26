<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <?php
        include_once 'admin_header.php';
    ?>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 bg-light rounded my-2 py-2">
                <h4 class="text-center text-dark pt-2">Delete</h4>
                <div>
                    <input type="submit" class="btn btn-danger" name="bulk_delete_submit" value="DELETE" />
                </div>
                <hr>
                <table class="table table-bordered table-striped table-hover" id='visitors_data'>
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select_all" value="" /></th>
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
                            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['ID']; ?>" /></td>
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
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var tabledata = $('#visitors_data').DataTable();

            $('#select_all').on('click', function() {
                if (this.checked) {
                    $('.checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });

            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
                }
            });
        });

    </script>
</body>

</html>
