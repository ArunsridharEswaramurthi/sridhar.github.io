<?php

include("adminloginpage.php");
include("connect.php");
 session_start();


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
		<div style="border:double #000033 2px;height:300px;width:500px;margin-left:400px;text-align:center;margin-top:-520px;">
        
        	<h2>USER REGISTER</h2>
            <table>
            <form method="post" action="auction.php">
            <tr>
            <td><label>PACKAGE TYPE :</label></td>
            <td><input type="text" name="type" id="type" placeholder="Enter Your Name" /></td>
            </tr>
            
            <tr>
            <td><label>AMOUNT :</label></td>
            <td><input type="text" name="amount" id="amount" placeholder="Auction Amount" /></td>
            </tr>
            
            
            <tr>
            <td><label>STARTING DATE :</label></td>
            <td><input type="date" name="start" id="start" placeholder="Starting Date" /></td>
            </tr>
            
            <tr>
            <td><label>STARTING TIME :</label></td>
            <td><input type="time" name="time" id="time" placeholder="Starting Date" /></td>
            </tr>
            
          
            <hr />
          
            </table>
            <hr />
          <div style="height:150px;width:100px;margin-left:190px;">
            <input type="submit" name="sub" id="sub" value="Save"  onclick="return mess()"/></div>
            </form>
        </div>
</body>
</html>
 <script type="test/javascript">
			   function mess()
			   {
				   alert("Auction Added SuceessFully");
			   
			       return true;
			   }
			   </script>
<?php

if(isset($_POST['sub'])){
	
				$type=mysqli_real_escape_string($con,$_POST['type']);
				$amt=mysqli_real_escape_string($con,$_POST['amount']);
				$s_date=mysqli_real_escape_string($con,$_POST['start']);
				$s_time=mysqli_real_escape_string($con,$_POST['time']);
				
				
					$selzz="SELECT * FROM `packagetype` where `packagetype`='".$type."' ";
									
								$runzs=mysqli_query($con,$selzz);
									
								$check=mysqli_num_rows($runzs);
								
								if($check==0)
								{
				
			
				
								$sel="INSERT INTO `auction_register`(`packagetype`, `amount`, `datej`, `time`) VALUES ('".$type."','".$amt."','".$s_date."','".$s_time."')";
									
								$run=mysqli_query($con,$sel);
								
								
								if($run)
								{
									 header("location:auction.php");
										exit();
									
								}
								}
								else
								{
									echo "<script>alert('Package Name Added SuccessFully')</script>";
									
								}
								
				}
				?>


