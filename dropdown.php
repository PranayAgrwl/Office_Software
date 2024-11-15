<?php
    include_once ('connection.php');

    $query = "SELECT * FROM MASTER ORDER BY NAME ASC";
    $result = sqlsrv_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><!-- Bootstrap file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> <!-- jQuery file -->
</head>

<body class="container">
    <?php include_once ('navbar.php');?>
    <br>

    <div>
        <form method="post">
            <div class="mb-3 mt-3">
                <select name="cust_code"> 
                    <option value=""></option>    
                    <?php while ($row = sqlsrv_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $row['CODE'] ; ?>">
                                <?php echo $row['NAME'];?> 
                            </option>
                        <?php
                    }
                    ?>
                </select>
            </div><br>
            <button type="submit" formaction="/pranay_sqlsrv/ledger.php" name="display_btn" class="btn btn-primary">Display</button>
        </form>
    </div>

</body>
</html>