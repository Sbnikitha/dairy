<?php
require_once "connection.php";
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
    
}

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $dairy = $_POST['dairy'];
    $sql = "UPDATE `users` SET `texts` = '".mysqli_real_escape_string($link,$_POST['dairy'])."' WHERE id = '".mysqli_real_escape_string($link,$_SESSION['id'])."'LIMIT 1" ;
        if(mysqli_query($link,$sql)){

			echo "successfully inserted the data ";
		}else{

			echo "oops! something went wrong please try again";
		}

        }
    


?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif;
             background-position: center;
      background-size: cover;
    background-image: url('https://codetheweb.blog/assets/img/posts/css-advanced-background-images/mountains.jpg');
}
    </style>
</head>
<body> <a href="logout.php" class="btn btn-primary ml-3" style="float: right;">log out</a>
    <h3 style="float: left; color:azure"> Secret Diary of: <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h3>
   
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div style="width: 100%;height:800px">
            <div class="form-group">
               
                <input type="text" name="dairy" class="form-control"style="width: 95%;height:440px; margin-right:20px; margin-left:20px" >
            </div>    
            <input type="submit" class="btn btn-success" value="Submit" style="float: right; margin-right:50px">
        </form>
    </div>
</body>
</html>