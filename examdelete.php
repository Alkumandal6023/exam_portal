<?php
session_start();

if(!isset($_SESSION['sid'])){
    header('location:login.php');
}

include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Perform the deletion using a transaction to ensure atomicity
    mysqli_autocommit($conn, false);
        // Delete related records first
        $sql_related = "DELETE FROM `register` WHERE eid='$id'";
        $result_related = mysqli_query($conn, $sql_related);
    

    // Delete related records from has_questions table first
    $sql_has_questions = "DELETE FROM `has_questions` WHERE eid='$id'";
    $result_has_questions = mysqli_query($conn, $sql_has_questions);

    // Then delete from the exam table
    $sql_exam = "DELETE FROM `exam` WHERE eid='$id'";
    $result_exam = mysqli_query($conn, $sql_exam);

    if ($result_has_questions&&$result_related && $result_exam) {
        mysqli_commit($conn);
        echo "Deleted Successfully";
        header('location:adminhome.php');
    } else {
        mysqli_rollback($conn);
        echo "Error in deletion: " . mysqli_error($conn);
    }

    mysqli_autocommit($conn, true); // Reset autocommit mode
}
?>
