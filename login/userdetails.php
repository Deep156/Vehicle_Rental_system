<?php
session_start();
    require_once "config.php";
    if($_SESSION['username'])
    {
        $query = mysqli_query($link, "SELECT * FROM `users` WHERE `username`='$_SESSION[username]'") or die(mysqli_error());
	   $fetch = mysqli_fetch_array($query); 
        if($fetch)
        {   echo '<body style="background-color:#aa9166">';
            echo "<h1 align='center'><font  color=black  size='6pt'>WE ARE GLAD TO HAVE YOU HERE</font></h1>";
            echo "<h3 align='left'><font  color=black  >YOUR LOGIN DETAILS ARE: </font></h3>";

            echo "<table border= 1px cellspacing=0 cellpading=0>
            <tr> <td><font color=white size='4pt'>YOUR REGISTRATION ID IS: </td> <td>{$fetch['id']}</font></td></tr>

<tr> <td><font color=white size='4pt'>YOUR USERNAME IS: </td> <td>{$fetch['username']}</font></td></tr>
<tr> <td><font color=white size='4pt'>DATE OF REGISTRATION IS: </td> <td>{$fetch['created_at']}</font></td></tr>
</table>";
        }
        echo "<h3 align='left'><font  color=black  >YOUR BOOKING DETAILS ARE: </font></h3>";

  $query1 = mysqli_query($link, "SELECT * FROM `book_d` WHERE `username`='$_SESSION[username]'") or die(mysqli_error());
  $a=1  ;
  while($fetch1 = mysqli_fetch_array($query1)) 
      
      {  
        echo "<p align='left'><font  color=black  >BOOKING NO: '$a' </font></p>";


          echo "<table border= 1px cellspacing=0 cellpading=0>
<tr> <td><font color=white size='4pt'>YOUR BOOKING ID IS: </td> <td>{$fetch1['id']}</font></td></tr>
<tr> <td><font color=white size='4pt'> VEHICLE YOU HAVE BOOKED IS: </td> <td>{$fetch1['vehicle']}</font></td></tr>

<tr> <td><font color=white size='4pt'>DATE OF BOOKING IS: </td> <td>{$fetch1['booked_at']}</font></td></tr>
</table>";
$a++;
echo "<br>";
        }

        echo "<h4 align='left'><font  color=black  ><a href='../profile.php'>Go to home page </a></font></h4>";

    }
?>




