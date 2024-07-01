<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $user1=$_POST['user'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    

    $sql="select * from `users` where sid='$user1' and password_data='$password' and role='$role'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "login successfuly";
            session_start();
            $_SESSION['sid']=$user1;
            if($role=='Student'){
                header('location:home.php');
            }
            else{
                header('location:adminhome.php');
            }
            
        }
        else{
           echo "invalid data";
   
        }
    }
 }

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    
    <title>Login</title>
   <link rel="stylesheet" href="home.css">
    
</head>
<body>
    <div class="container1" >
        <div class="box">
            <div class="container2">
                <div class="form-main">
        <form action='login.php' method ='post' >

             
            
            <label class="label">User Name:</label>
            <input type="text" name='user' class="box-nav">
            <br><br>
            <label class="label">Password :</label>
            <input type="text" name='password' class="box-nav">
            <br><br>
            <select id="role" name="role" required class="select">
                <option value="" disabled selected>Select Role</option>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
            </select>
            <button id="button">login</button>
            <br>
            <br>
            <a href="signup.php">Create Account</a>
        </form>
    </div>
</div>
</div>
</div>
</body>
</html>