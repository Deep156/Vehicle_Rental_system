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
    $selected = $_POST['bicycles'];
    if(!empty($_POST['bicycles']))
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
div.bicycle{
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
 <center><h1>We are happy that you booked a bicycle!</h1> </center>
 <center><h3>Please confirm us by selecting name of bicycle you want</h3> </center>

<br></br>
<br></br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   <center>
   <div class = "bicycle" >
      <label for="bicycles">Choose a bicycle:</label>
 
    <select name="bicycles" id="bicycles" class="form-control">
    <option value="Handbrake Bike">Handbrake Bike</option>
    <option value="Footbrake Bike">Footbrake Bike</option>
    <option value="Small Bike">Small Bike</option>
    <option value="Kids Bike">Kids Bike</option>
    
    <option value="Cargo Bike">Cargo Bike</option>
    <option value="Tandem">Tandem</option>
    <option value="Electric Bike">Electric Bike</option>
    <option value="Ladies Bike">Ladies Bike</option>
    <option value="Gentlemen's Bike">Gentlemen's Bike</option>
    
    </div>

  </select></center>
  <br><br>
   <center><input type="submit" name="submit" value="Submit"></center>
</form>



</body>
</html>
