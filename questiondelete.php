<?php
session_start();
if (!isset($_SESSION['sid'])) {
    header('location:login.php');
}
include 'connect.php';

if (isset($_GET['deletqid'])) {
    $qid = $_GET['deletqid'];

    // Perform the deletion using a transaction to ensure atomicity
    mysqli_autocommit($conn, false);
       
    // Delete related records from has_questions table first
    $sql_has_questions = "DELETE FROM `has_questions` WHERE qid='$qid'";
    $result_has_questions = mysqli_query($conn, $sql_has_questions);

    // Then delete from the exam table
    $sql_question = "DELETE FROM `question` WHERE qid='$qid'";
    $result_question = mysqli_query($conn, $sql_question);

    if ($result_has_questions && $result_question) {
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