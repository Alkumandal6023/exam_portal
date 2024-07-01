<?php
session_start();
 $correctanswer=$_SESSION['correctanswer'];
// foreach($correctanswer as $x){
//     echo $x;
// }
$obtain_marks=0;
$total_marks=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questions = $_POST['questions'];
     $num=0;
    foreach ($questions as  $question) {
        $qid = $question['qid'];
        $qcontentss = $question['qcontent'];
        $marks = intval($question['marks']);
        $val=$correctanswer[$num];
        $num=$num+1;
        
        if($qcontentss ==$val){
            $obtain_marks=$obtain_marks+$marks;
        }
        $total_marks=$total_marks+$marks;


        echo "<p>ID: $qid</p>";
        echo "<p>Your Answer: $qcontentss</p>";
        echo "<p>Right Answer:$val </p>";
        
        echo "<p>Marks: $marks</p>";
       
    }
} 
else {
    // Handle cases where the form is not submitted using POST
    echo "<p>Error: Invalid request method.</p>";
}

echo   " Marks obtained is   $obtain_marks  " ;
echo "<br>";
echo "Total marks is   $total_marks";


?>
