<?php

include("index.php");
include("connect.php");


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Auction </title>

<style>
label{
    display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: right;
	 line-height: 200%;

}

input {
  display: inline-block;
  float: left;
}



</style>
</head>

<body>
		<div style="border:double #000033 2px;height:300px;width:500px;margin-left:400px;text-align:center;margin-top:-500px;">
        
        	<h2>Admin Login</h2>
            <table>
            <form method="post" action="adminlogin.php">
            <tr>
            <td><label>User Name :</label></td>
            <td><input type="text" name="user" id="user" placeholder="Enter Your UserName" /></td>
            </tr>
            
            <tr>
            <td><label>Password :</label></td>
            <td><input type="password" name="pass" id="pass" placeholder="Enter Your Password" /></td>
            </tr>
            <hr />
          
            </table>
            <hr />
          <div style="height:150px;width:100px;margin-left:190px;">
            <input type="submit" name="sub" id="sub" value="Login" /></div>
            </form>
        </div>
</body>
</html>

<?php

if(isset($_POST['sub'])){
				$admin_name=mysqli_real_escape_string($con,$_POST['user']);
				$admin_pass=mysqli_real_escape_string($con,$_POST['pass']);
				
				
								$sel="SELECT * FROM `admin` where `user`='".$admin_name."' AND `password`='".$admin_pass."' ";
									
								$run=mysqli_query($con,$sel);
									
								$check=mysqli_num_rows($run);
								
								if($check==0)
								{
								
								echo "<script>alert('User name and Password incorrect')</script>";
													
								}
								else
								{
									echo "<script>window.open('adminloginpage.php','_.self')</script>";
								}
								
				}
				?>


