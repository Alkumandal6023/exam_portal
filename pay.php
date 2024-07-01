<?php
session_start();
if (!isset($_SESSION['sid'])) {
    header('location:login.php');
}

include 'connect.php';



if (isset($_GET['e_id'])) {
    $eid = $_GET['e_id'];

    $sql = "INSERT INTO `register` (sid, eid) VALUES ('" . $_SESSION['sid'] . "', '$eid')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo $_SESSION['sid'];
        echo "Registration Successfully";
        header('location:home.php');
    } else {
        echo "already registered";
        header('examreg.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>Registertation Successfuly</h1>
    <?php echo $_SESSION['sid']; ?> </p> -->
    
</body>
</html>