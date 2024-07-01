<?php
include 'connect.php';
session_start();
if (isset($_GET['start'])) {
    $exaid = $_GET['start'];
}


?>
<!-- <button > <a href="questiondelete.php?deletqid='.$qid.' ">Delete</a></button> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Form</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
<div class="container">
        
        <header>
            <div class="navContainer">
                <nav>
                    <ul id="navList">
                        <li>
                            <p id="navLogo">Exam system</p>
                        </li>
                        <li>
                            <div id="navItems">
                                
                                <p>Hello 
                                <?php echo $_SESSION['sid']; ?> </p>
                               
                                <a href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>



<div class="mytable">
    <div id="Table">
 
 <?php
   $_SESSION['exid'] = $exaid;
   $examID = $_SESSION['exid'];
   $sql = "SELECT question.qid, question.qcontent,question.qsolutions, question.qexp
    FROM has_questions
    INNER JOIN question ON has_questions.qid = question.qid
    WHERE has_questions.eid = '$examID'";
$result = mysqli_query($conn, $sql);
echo '<form method="post" action="marks.php">';

$correct_answer=[];
$user_answer=[];
$points='marks';

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $qid = $row['qid'];
        $qcontent = $row['qcontent'];
        $sol = $row['qsolutions'];
        $marks = $row['qexp'];
        
        array_push($correct_answer,$sol);

        echo '<label>
                ' . $qid . ' .    ' . $qcontent . '  
                </label>
<input type="hidden" name="questions['.$qid.'][qid]" value="' . $qid . '">
<input  name="questions['.$qid.'][qcontent]" >  --  '   . $marks . ''.$points.'
<input type="hidden" name="questions['.$qid.'][marks]" value="' . $marks . '">
<br>';   

    }
}

$_SESSION['correctanswer'] = $correct_answer;
echo '<button type="submit">Submit</button>';
echo '</form>';

    
        ?>

</div>
</div>
       
</body>
</html>

