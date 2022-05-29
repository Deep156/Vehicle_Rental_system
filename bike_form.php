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
   
    $selected = $_POST['bikes'];
    if(!empty($_POST['bikes']))

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
div.bike{
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
 <center><h1>We are happy that you booked a bike!</h1> </center>
 <center><h3>Please confirm us by selecting name of bike you want</h3> </center>

<br></br>
<br></br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   <center>
   <div class = "bike" >
      <label for="bikes">Choose a bike:</label>
 
    <select name="bikes" id="bikes" class="form-control">
    <option value="Honda Activa">Honda Activa</option>
    <option value="Royal Enfield">Royal Enfield</option>
    <option value="Avenger Street 220">Avenger Street 220</option>
    <option value="Pulsar 180">Pulsar 180</option>
    
    <option value="KTM RC 390">KTM RC 390</option>
    <option value="Royal Enfield 500 CC">Royal Enfield 500 CC</option>
    <option value="Suzuki Gixxer">Suzuki Gixxer</option>
    <option value="TVS Jupiter">TVS Jupiter</option>
    <option value="Triumph Rocket III">Triumph Rocket III</option>
    <option value="Yamaha Alpha">Yamaha Alpha</option>
    <option value="Honda Navi">Honda Navi</option>
    <option value="Ducati Hyperstrada">Ducati Hyperstrada</option>
	<option value="Honda Navi">Honda Navi</option>
	
    </div>

  </select></center>
  <br><br>
   <center><input type="submit" name="submit" value="Submit"></center>
</form>



</body>
</html>
