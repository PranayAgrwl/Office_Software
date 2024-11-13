<?php
include_once 'connection.PHP';
include_once 'navbar.php';

  if(isset($_REQUEST['display_btn'])) {
  $cust_code = $_REQUEST['cust_code'];
  // echo $cust_code;
  }

$LEDCODE = $cust_code ;

$sql="SELECT MASTER.NAME AS NAME, MASTER1.NAME AS REFNAME, VNO, FORMAT(FAS.DATE,'dd/MM/yyyy') as DATE ,FORMAT(CRAMT,'0.00') as CRAMT  ,FORMAT(DRAMT,'0.00') AS DRAMT FROM (FAS INNER JOIN MASTER ON FAS.CODE= MASTER.CODE) INNER JOIN MASTER AS MASTER1 ON FAS.REFCODE=MASTER1.CODE WHERE FAS.CODE='$LEDCODE' ORDER BY CONCAT(FORMAT(FAS.DATE,'yyyyMMdd'),FAS.TYPE,FAS.VNO) ";

$sql1 = "SELECT CONCAT(NAME,' - ', CITY1) AS NAME1 FROM MASTER WHERE CODE = '$LEDCODE' ";

$sql2 = " SELECT FORMAT(Sum(FAS.CRAMT),'0.00') AS CRAMT, FORMAT(Sum(FAS.DRAMT),'0.00') AS DRAMT, FORMAT(Sum([FAS].[DRAMT])-Sum([FAS].[CRAMT]),'0.00') AS BAL FROM FAS WHERE (((FAS.CODE)='$LEDCODE'))"  ;

$result2 = sqlsrv_query( $conn, $sql );

if( $result2 === false) {
   die( print_r( sqlsrv_errors(), true) );
}

$result3 = sqlsrv_query( $conn, $sql1 );

$result4 = sqlsrv_query( $conn, $sql2 );



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
    <style>

    </style>
</head>
<body class="container">

<h4> 
    <?php 
        ( $row1 = sqlsrv_fetch_array( $result3, SQLSRV_FETCH_ASSOC) ); 
        echo $row1 ['NAME1'];
    ?>  
</h4>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>DATE</th>
        <th>V NO</th>
        <th>REF NAME</th>
        <th>CR AMT</th>
        <th>DR AMT</th>
      </tr>
    </thead>
    <tbody>
    <?php            
    while( $row = sqlsrv_fetch_array( $result2, SQLSRV_FETCH_ASSOC) ) {
    ?>
      <tr>
        <td><?php echo $row['DATE'] ?></td>
        <td><?php echo $row['VNO'] ?></td>
        <td><?php echo $row['REFNAME'] ?></td>
        <td align='right'><?php echo $row['CRAMT'] ?></td>
        <td align='right'><?php echo $row['DRAMT'] ?></td>
      </tr>
    <?php
    }
    ?>


        <tr>
            <?php 
            ( $row2 = sqlsrv_fetch_array( $result4, SQLSRV_FETCH_ASSOC) ); 
            $abc = $row2 ['CRAMT'];
            $abc1 = $row2 ['DRAMT'];
            $abc2 = $row2 ['BAL'];
            ?>  
                <td></td>
                <td></td>
                <td><p><b>TOTAL</b></p></td>
                <td align='right'><b><?php echo $abc ?></b></td>
                <td align='right'><b><?php echo $abc1 ?></b></td>
        </tr>
        <tr>
                <td></td>
                <td></td>
                <td><p><b>BAL</b></p></td>
                <td></td>
                <td align='right'><b><?php echo $abc2 ?></b></td>
        </tr>

    </tbody>
  </table>




</body>
</html>