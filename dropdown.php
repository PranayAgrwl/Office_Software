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


    <?php
        if(isset($_REQUEST['display_btn'])) {
            $cust_code = $_REQUEST['cust_code'];

            // $query_cust = "SELECT * FROM BILLS WHERE CODE = '$cust_code' ORDER BY DATE DESC;";
            // $result_cust = sqlsrv_query($conn, $query_cust);
            
            // if(sqlsrv_has_rows($result_cust)) {

            //     $query_name = "SELECT NAME FROM MASTER WHERE CODE = '$cust_code' ";    
            //     $result_name = sqlsrv_query($conn, $query_name);
            //     $row_name = sqlsrv_fetch_array($result_name);
            //     echo "Name: ". $row_name['NAME'];  // Displaying the name of the customer
            //     echo "<br>";
            //     echo "<br>";

                
            //     while ($row_cust = sqlsrv_fetch_array($result_cust)) {
            //         echo $row_cust['BILL'];
            //         echo "<br>" ;
            //         // echo date($row_cust['DATE']);
            //     }
                
            // }

            // else
            // {
            //     echo "ID NOT FOUND";
            // }
        }
        
        

    ?>


</body>
</html>