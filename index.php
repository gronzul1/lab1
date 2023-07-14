<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1</title>
    <style>
        h1 {
            color: red;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Welcome to Autoscale Instance</h1>
    <div>Current time <b>
            <?php 
    $date = date('d-m-y h:i:s');
    echo $date;
    ?>
        </b></div>
    <div>Server Hostname:<b>
            <?php echo gethostname(); ?>
        </b></div>
    <div>
        Go to <a href="webapp.php">Lab Page</a>
    </div>
</body>
</html>