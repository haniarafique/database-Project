<?php
//$username = $_POST['user_name'];
//$password = $_POST['pass_word'];
$conn = mysqli_connect('localhost', 'root', 'root');
if (!$conn){
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}
if (isset($_POST['user_name']) and isset($_POST['pass_word'])){
	
    // Assigning POST values to variables.
    $username = $_POST['user_name'];
    $password = $_POST['pass_word'];
    
    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `account` WHERE username='$username' and password='$password'";
     
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    
    if ($count == 0)
    {
    echo "INVALID CREDENTIALS";
    //header('Location:login.php');
    header('Location:login.php?passwordFailure=1');
    
    
    }
    
    else
    {
      
        header('Location:guest.php');
    
    }

    }

    mysqli_close($conn);
    ?>