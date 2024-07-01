<?php
include 'connect.php';
session_start();
$exID = $_SESSION['eid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qid = $_POST['qid'];
    $content = $_POST['content'];
    $solution = $_POST['solution'];
    $difficulty = $_POST['diffculty'];
    $marks = $_POST['marks'];

    $sql= "SELECT * FROM `question` WHERE qid='$qid'";
    $result=mysqli_query($conn,$sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "Question ID already exists";
        } else {
            // Prepare the SQL statement using placeholders
            $sql_insert_question = "INSERT INTO `question` (qid, qcontent, qsolutions, difficulty, qexp) VALUES (?, ?, ?, ?, ?)";
            
            // Create a prepared statement
            $stmt = mysqli_prepare($conn, $sql_insert_question);

            // Bind parameters with the actual values
            mysqli_stmt_bind_param($stmt, "ssssi", $qid, $content, $solution, $difficulty, $marks);

            // Execute the statement
            $result_has = mysqli_stmt_execute($stmt);

            // Check for success
            if ($result_has) {
                echo "Question added successfully";

                // Insert into the has_question table
                $sql_insert_has_question = "INSERT INTO has_questions (eid, qid) VALUES ('$exID', '$qid')";
                $result_insert_has_question = mysqli_query($conn, $sql_insert_has_question);

                if ($result_insert_has_question) {
                    echo "Question linked to exam successfully";
                } else {
                    echo "Error linking question to exam: " . mysqli_error($conn);
                }

                // Redirect to another page after successful addition
                header("Location:adminhome.php");
                exit();
            } else {
                echo "Error adding question: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Error checking question: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <title>Question</title>
</head>

 
<div class="container1">
    <div class="box">
        <div class="container2">
            <div class="form-main">
            <form action='addquestion.php' method='post'>
            <label class="label">Question ID:</label>
            <input type="text" name='qid' class="box-nav">
            <br><br>
            <label class="label">Content :</label>
            <input type="text" name='content' class="box-nav">
            <br><br>
            <label class="label">Solution :</label>
            <input type="text" name='solution' class="box-nav">
            <br><br>
            <label class="label">Difficulty :</label>
            <input type="text" name='diffculty' class="box-nav">
            <br><br>
            <button id="button">Add </button>
            </form>
            </div>
         </div>
    </div>
</div>
    
</body>

</html>