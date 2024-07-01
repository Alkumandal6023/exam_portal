<?php
session_start();
if (!isset($_SESSION['sid'])) {
    header('location:login.php');
}
include "connect.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Registration</title>
</head>
<body>
 
<div class="mytable">
  <header> Register</header>
    <table id="Table">
        <tr>
            <th>Exam ID</th>
            <th>Exam Name</th>
            <th>Fees</th>
            <th>Register</th>
        </tr>
        <?php

        $sql = "SELECT * FROM `exam`";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $eid = $row['eid'];
                $ename = $row['ename'];
                $fees = $row['fees'];

                // Check if the exam is registered for the logged-in user
                $check_registration_sql = "SELECT * FROM `register` WHERE eid = '$eid' AND sid = '" . $_SESSION['sid'] . "'";
                $registration_result = mysqli_query($conn, $check_registration_sql);
                $is_registered = mysqli_num_rows($registration_result) > 0;

                // Display "Pay" button only if the user is not registered for the exam
                if (!$is_registered) {
                    echo '<tr>
                            <td>' . $eid . '</td>
                            <td>' . $ename . '</td>
                            <td>' . $fees . '</td>
                            <td><button><a href="pay.php?e_id=' . $eid . '">Pay</a></button></td>
                          </tr>';
                }
            }
        }
        ?>
    </table>
</div>
</body>
</html>
