<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['sid'])){
    header('location:login.php');
}

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
        <button ><a href="addexam.php">Add Exam</a></button>
        <table id="Table">
  
    <tr>
      <th >Exam ID    </th>
      <th >Exam Name   </th>
      <th >Fees   </th>
      <th >Operations</th>
    </tr>
  
  
   <?php

   $sql="select * from `exam` ";
   $result=mysqli_query($conn,$sql);
   if($result){
    while($row=mysqli_fetch_assoc($result)){
        $eid=$row['eid'];
        $ename=$row['ename'];
        $fees=$row['fees'];
        echo  '<tr>
            <td>'.$eid.'</th>
            <td>'.$ename.'</td>
            <td>'.$fees.'</td>
            <td><button > <a href="question.php?examid='.$eid.'">Questions</a></button>
            <button > <a href="examdelete.php?deleteid='.$eid.' ">Delete</a></button>
            
            </td>
          </tr>';
      
    }
   }
   ?>
    



  
  
</table>
    </div>

</body>
</html>

    
