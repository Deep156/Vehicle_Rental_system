<?php


session_start();
require_once "login/config.php";
$con=mysqli_connect("localhost","root","","login");


if($_SESSION['username'])
{
    $query = mysqli_query($link, "SELECT * FROM `users` WHERE `username`='$_SESSION[username]'") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query); 
    if(isset($_POST['submit']))
{
   
    $selected = $_POST['cars'];
    if(!empty($_POST['cars']))

    {
        
        $query = "INSERT INTO book_d (username,vehicle) VALUES ('".$fetch['username']."','$selected')";
            $query_run=mysqli_query($con,$query); 
            
            
            if($query_run)
            {
               header("Location: pay.html");
            }
            else
            {
                echo "DO AGAIN";
            }
    }
}
}
?>





<!DOCTYPE html>
<html>
<body>
<style>
body{
	background-image:linear-gradient(to right, #aa9166, #000000);
}
div.car{
	font-size : 30px;
}
input[type=text] {
  background-color: #e8d3b0;
  width: 100%;
}

input[type=submit] {
  background-color: #aa9166;
  color: #000;
  height:35px;
  width:140px;
  cursor: pointer;
}
.form-control{
	height:30px;
	width:170px;
	background-color:#aa9166;
}
</style>
<br></br>
<br></br>
 <center><h1>We are happy that you booked a car!</h1> </center>
 <center><h3>Please confirm us by selecting name of car you want</h3> </center>

<br></br>
<br></br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   <center>
   <div class = "car" >
      <label for="cars">Choose a car:</label>
 
    <select name="cars" id="cars" class="form-control">
    <option value="Maruti Wagon R">Maruti Wagon R</option>
    <option value="Santro">Santro</option>
    <option value="Hyundai i20">Hyundai i20</option>
    <option value="Swift">Swift</option>
    
    <option value="Swift Dzire">Swift Dzire</option>
    <option value="Nissan Micra">Nissan Micra</option>
    <option value="Baleno">Baleno</option>
    <option value="Hyundai Grand i10">Hyundai Grand i10</option>
    <option value="Maruti Suzuki Ertiga">Maruti Suzuki Ertiga</option>
    <option value="Swift">Fortuner</option>
    <option value="Swift">Chevrolet enjoy</option>
    <option value="Swift">Innova Crysta</option>
    </div>

  </select></center>
  <br><br>
   <center><input type="submit" name="submit" value="Submit"></center>
</form>



</body>
</html>
