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
   
    $selected = $_POST['buses'];
    if(!empty($_POST['buses']))

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
div.bus{
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
 <center><h1>We are happy that you booked a bus!</h1> </center>
 <center><h3>Please confirm us by selecting name of bus you want</h3> </center>

<br></br>
<br></br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   <center>
   <div class = "bus" >
      <label for="buses">Choose a bus:</label>
 
    <select name="buses" id="buses" class="form-control">
    <option value="Seitz Reisen">Seitz Reisen</option>
    <option value="Double Decker">Double Decker</option>
    <option value="Tempo Traveller">Tempo Traveller</option>
    <option value="The Newmar King Aire">The Newmar King Aire</option>
    
    <option value="Ashok Leyland">Ashok Leyland</option>
    <option value="Voyganics">Voyganics</option>
    <option value="Access Nationwide">Access Nationwide</option>
    <option value="Easy Bus">Easy Bus</option>
    <option value="Force Traveler">Force Traveler</option>
 
    </div>

  </select></center>
  <br><br>
   <center><input type="submit" name="submit" value="Submit"></center>
</form>



</body>
</html>
