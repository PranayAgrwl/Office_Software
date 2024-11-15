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
                <input type="number" name="bill_no" placeholder="Enter Sale Bill Number" required>
            <button type="submit" formaction="/pranay_sqlsrv/salebill.php" name="display_btn" class="btn btn-primary">Display</button>
        </form>
    </div>


</body>
</html>