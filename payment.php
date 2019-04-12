<?php

include("adminloginpage.php");
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
		<div style="border:double #000033 2px;height:300px;width:500px;margin-left:400px;text-align:center;margin-top:-520px;">
        
        	<h2>AUCTION ADDED</h2>
            <table>
            <form method="post" action="payment.php">
            <tr>
            <td><label>USER NAME :</label></td>
            <td> <select class="form-control" name="aname" id="aname">
       		 <option value="Select">Select</option>
                    <?php 
                                $sql="Select * from register";
                                $z=mysqli_query($con,$sql);
                                while($row= mysqli_fetch_array($z))
                    {
        
        ?>
        <option value="<?php echo $row['name'];  ?>"><?php echo  $row['name'];?></option>
        <?php
        }
         ?>
        
        </select></td>
            </tr>
            
            <tr>
            <td><label>AUCTION TYPE :</label></td>
           <td> <select class="form-control" name="atype" id="atype">
       		 <option value="Select">Select</option>
                    <?php 
                                $sql="Select * from auction_register";
                                $z=mysqli_query($con,$sql);
                                while($row= mysqli_fetch_array($z))
                    {
        
        ?>
        <option value="<?php echo $row['packagetype'];  ?>"><?php echo  $row['packagetype'];?></option>
        <?php
        }
         ?>
        
        </select></td>
        </tr>
            
           
            <tr>
            <td><label>AMOUNT :</label></td>
            <td><input type="text" name="amount" id="amount" placeholder="Fanalized Amount" /></td>
            </tr>
            
          
            <hr />
          
            </table>
            <hr />
          <div style="height:150px;width:100px;margin-left:190px;">
            <input type="submit" name="sub" id="sub" value="Save" /></div>
            </form>
        </div>
</body>
</html>

<?php

if(isset($_POST['sub'])){
	
				$aname=mysqli_real_escape_string($con,$_POST['aname']);
				$atype=mysqli_real_escape_string($con,$_POST['atype']);
				$amount=mysqli_real_escape_string($con,$_POST['amount']);
				
				
				$selzz="SELECT * FROM `auction_amount` where `uname`='".$aname."' AND `type`='".$atype."' ";
									
								$runzs=mysqli_query($con,$selzz);
									
								$check=mysqli_num_rows($runzs);
								
								if($check==0)
								{
			
				
								$sel="INSERT INTO `auction_amount`(`uname`, `type`, `amount`) VALUES ('".$aname."','".$atype."','".$amount."')";
									
								$run=mysqli_query($con,$sel);
								
								
								if($run)
								{
									echo "<script>alert('Amount Has Been Added')</script>";
									
								}
								}
								else
								{
									
									echo "<script>alert('Already Amount Send to User ')</script>";	
									
								}
								
				}
				?>


