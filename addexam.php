<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $eid = $_POST['eid'];
    $Ename = $_POST['name'];
    $fee = $_POST['fee'];

    $sql = "select * from `exam` where eid='$eid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "Exam already exists";
        } else {
            $sql = "insert into `exam` (eid, ename, fees) values ('$eid', '$Ename', '$fee')";
            $result = mysqli_query($conn, $sql);
            header('location:adminhome.php');
           // echo "Added Successfully";
            if (!$result) {
                die(mysqli_error($conn));
            }
        }
    }
}
?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <title>Exam</title>
    
</head>
<body>
<div class="container1" >
    <div class="box">
        <div class="container2">
            <div class="form-main">
            <form action='addexam.php' method ='post' >
            <label class="label">Exam ID:</label>
            <input type="text" name='eid' class="box-nav">
            <br><br>
            <label class="label">Exam Name :</label>
            <input type="text" name='name' class="box-nav">
            <br><br>
            <label class="label">Fee:</label>
            <input type="int" name='fee' class="box-nav"><br>

            <button id="button">Add </button>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>