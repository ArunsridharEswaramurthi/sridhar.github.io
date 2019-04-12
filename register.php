<?php

include("adminloginpage.php");
include("connect.php");



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Auction </title>

<style>
label
{
    display: inline-block;float: left;
    clear: left;
    width: 250px;
    text-align: right;
	line-height: 200%;

}

input
{
  display: inline-block;
  float: left;
}



</style>
</head>

<body>
		<div style="border:double #000033 2px;height:510px;width:500px;margin-left:400px;text-align:center;margin-top:-520px;">
        
        	<h2>USER REGISTER</h2>
            <table>
            <form method="post" action="register.php">
            <tr>
            <td><label>NAME :</label></td>
            <td><input type="text" name="name" id="name" placeholder="Enter Your Name" /></td>
            </tr>
            
            <tr>
            <td><label>ADDRESS :</label></td>
            <td><textarea cols="20" rows="10" name="address" id="address"></textarea></td>
            </tr>
            
            
            <tr>
            <td><label>PHONE :</label></td>
            <td><input type="text" name="phone" id="phone" placeholder="Enter Your Name" /></td>
            </tr>
            
            
            <tr>
            <td><label>EMAIL :</label></td>
            <td><input type="email" name="email" id="email" placeholder="Enter Your Name" /></td>
            </tr>
            
             <tr>
            <td><label>LOGIN-ID :</label></td>
            <td><input type="text" name="login" id="login" placeholder="Enter Your Login" /></td>
            </tr>
            
            <tr>
            <td><label>Password :</label></td>
            <td><input type="password" name="pass" id="pass" placeholder="Enter Your Password" /></td>
            </tr>
            <hr />
          
            </table>
            <hr />
          <div style="height:150px;width:100px;margin-left:190px;">
            <input type="submit" name="sub" id="sub" value="Save" onclick="return mess()"/></div>
            </form>
        </div>
</body>
</html>
 <script type="test/javascript">
			   function mess()
			   {
				   alert("User Register Added SuccessFully");
			   
			       return true;
			   }
			   </script>
<?php

if(isset($_POST['sub'])){
	
				$name=mysqli_real_escape_string($con,$_POST['name']);
				$address=mysqli_real_escape_string($con,$_POST['address']);
				$phme=mysqli_real_escape_string($con,$_POST['phone']);
				$mail=mysqli_real_escape_string($con,$_POST['email']);
				$login=mysqli_real_escape_string($con,$_POST['login']);
				$pass=mysqli_real_escape_string($con,$_POST['pass']);
				
				
					
				$selzz="SELECT * FROM `register` where `name`='".$name."' ";
									
								$runzs=mysqli_query($con,$selzz);
									
								$check=mysqli_num_rows($runzs);
								
								if($check==0)
								{
				
				
								$sel="INSERT INTO `register`(`name`, `address`, `phone`, `email`, `login`, `password`) VALUES ('".$name."','".$address."','".$phme."','".$mail."','".$login."','".$pass."')";
									
								$run=mysqli_query($con,$sel);
								
								$check1=mysqli_fetch_array ($run);
									
								if($run)
								{
									 header("location:register.php");
										exit();
									
								}
								}
								else
								{
									
									echo "<script>alert('User Name Already Register try Another name ')</script>";
									
								}
								
				}
				?>


