
<?php

$servername = "localhost";
$username = "id13159516_anirudh53";
$password = "AnirudhTapedia@123";

// Create connection
$conn = new mysqli($servername, $username, $password,"id13159516_anirudh");

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$fname = "";
$lname= "";
$passsword="";
$email="";
$phone="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  $password=test_input($_POST['pswrd']);
  $email=test_input($_POST['email']);
  $phone=test_input($_POST['phone']);
}  
  
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<font size=12 color="blue"> <center>
    Welcome to email registration portal please enter the details
</center> </font>

<form method="POST">
<center><font size=10>
First Name : <input type="text" name="fname"><br>
Last Name:  <input type="text" name="lname"><br>
password:  <input type="password" name='pswrd'><br>
Email : <input type= "email " name='email'> <br>
Phone no. :<input type="number" name='phone'> <br>

<input type="submit" value="Submit"   name='submit'>

</center>





<?php

    /*

   if (isset($_POST["submit"])&& $conn) {
           
            if (empty($fname) ){
               $msg = "*First Name is required";
               
            }
			else if (empty($lname)) {
               $msg = "*Last Name is required";
                
            }
			else if (empty($email)) {
               $msg = "*Email is required";
            }
            else if (empty($password)) {
               $msg = "*password is required";
            }

   
   } 
 Currently I am not using the above code in actual webpage because, As soon as i enter the incorrect details and submit and then refresh the page those error msgs are still visible */
 
   
    $sql= "INSERT INTO details (FirstName,LastName,email,psswrd,phone) VALUES 
    ('$fname', '$lname','$email','$password','$phone')";
                
                
                
    if ($conn->query($sql) === FALSE) {
    echo "";
    // echo $msg
                    
    }
                
    else
                
    {
    echo "Welcome ".$fname;
    /* header("Location: anirudh121.000webhostapp.com/welcome.php?user=$fname");
      I am not able to redirect into a new page as i am getting this warning
      Warning: Cannot modify header information - headers already sent by (output started at /storage/ssd3/516/13159516/public_html/index.php:1) in /storage/ssd3/516/13159516/public_html/index.php on line 80
      */
      
    }        
     
      mysqli_close($conn);
          
    ?>


<!--
You can view the live page in anirudh121.000webhostapp.com 
    Currently In the details table i have set the Email as unique. Hence ,Diff email ids will not be entered.
    Fname,last name,pssword,email are set to not NULL.. Hence if u enter the Null data ur data wont be stored in the database
-->

</html>






