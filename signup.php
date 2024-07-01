<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $name=$_POST['name'];
    $user1=$_POST['user'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $role=$_POST['role'];
    

    
    $sql="select * from `users` where sid='$user1'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "user already exist";
        }
        else{
           
            if($role=='Student'){
                $sql="insert into `student`(sid,sname,phno) values('$user1','$name','$phone')";
                $result=mysqli_query($conn,$sql);
                if(!$result){
                    die(mysqli_error(conn));
                }
            }
            
            
            $sql="insert into `users`(name,sid,password_data,role) values('$name','$user1','$password','$role')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "signup sucessfuly";
               
                }
    else{
        die(mysqli_error(conn));
    }
        }
    }
}
?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    
    <title>Sign up</title>
    <link rel="stylesheet" href="home.css">
    
</head>
<body>
    <div class="container1" >
        <div class="box">
            <div class="container2">
                <div class="form-main">
        <form action='signup.php' method ='post' >

             
            <label class="label">Name :</label>
            <input type="text" name='name' class="box-nav" required>
            <br><br>
            <label class="label">User Name :</label>
            <input type="text" name='user' class="box-nav" required>
            <br><br>
            <label class="label">Password :</label>
            <input type="text" name='password' class="box-nav" required>
            <br><br>
            <label class="label">Phone No :</label>
            <input type="int" name='phone' class="box-nav" required>
            <br><br>
            <select id="role" name="role" required class="select">
                <option value="" disabled selected>Select Role</option>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
                
            </select>

            <button id="button">Sign up</button>
        </form>

        <br>
        <a href="login.php">Log IN</a>
    </div>
</div>
</div>
</div>
</body>
</html>