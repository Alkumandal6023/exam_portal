<?php
include 'connect.php';
session_start();

if(!isset($_SESSION['sid'])){
    header('location:login.php');
}
 // Replace 123 with the actual user ID or any value you want to store

// Retrieve and use the session variable


// Output the session variable

if((isset($_GET['examid']))){
    $Eid = $_GET['examid'];
    
}
$_SESSION['eid'] = $Eid;
$exID = $_SESSION['eid'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                                <a href="adminhome.php">Home page
                                <!-- <a href="examreg.php">Exam Registration</a> -->
                                <a href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
   
   
    
   
   
    </div>
    <div class="mytable">
        
     <table id="Table">
  <thead>
    <tr>
      <th >QID    </th>
      <th >Content   </th>
      <th >Solution   </th>

       <th >Diffculty(Rating)</th>
      <th >Marks</th>
      <th >operation</th> 
    </tr>
  </thead>
  <tbody>
   <?php

   //$sql="select * from `has_questions` where eid='$exID'";
   $sql = "SELECT question.qid, question.qcontent,question.qsolutions, question.qexp,question.difficulty
   FROM has_questions
   INNER JOIN question ON has_questions.qid = question.qid
   WHERE has_questions.eid = '$exID'";
   $result=mysqli_query($conn,$sql);
   if($result){
    while($row=mysqli_fetch_assoc($result)){
        $qid=$row['qid'];
         $content=$row['qcontent'];
         $solution=$row['qsolutions'];
         $diffculty=$row['difficulty'];
        $marks=$row['qexp'];
         // <td>'.$content.'</td>
            // <td>'.$solution.'</td>
            // <td>'.$diffculty.'</td>
            // <td>'.$exp.'</td>
        echo  '<tr>
            <td >'.$qid.'</td>
           
             <td>'.$content.'</td>
             <td>'.$solution.'</td>
             <td>'.$diffculty.'</td>
             <td>'.$marks.'</td>
             

            <td>
            <button > <a href="questiondelete.php?deletqid='.$qid.' ">Delete</a></button>
            
            </td>
          </tr>';
      
    }
   }









//    <button><a href="addquestion.php?exid='.$Eid.'">Add Question</a></button>

   ?>
   </a>

  <button id="button"> <a href="addquestion.php">Add Question</a></button>

    



  </tbody>
  
</table>
    </div>

</body>
</html>

    
</body>
</html>