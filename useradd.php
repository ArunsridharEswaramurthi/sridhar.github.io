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
            <form method="post" action="useradd.php">
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
            <input type="submit" name="sub" id="sub" value="Save" /></div>
            </form>
        </div>
</body>
</html>

<?php

if(isset($_POST['sub'])){
	
				$aname=mysqli_real_escape_string($con,$_POST['aname']);
				$atype=mysqli_real_escape_string($con,$_POST['atype']);
				$s_date=mysqli_real_escape_string($con,$_POST['start']);
				$s_time=mysqli_real_escape_string($con,$_POST['time']);
				
				
				$selzz="SELECT * FROM `useradd` where `atype`='".$atype."' AND `aname`='".$aname."' ";
									
								$runzs=mysqli_query($con,$selzz);
									
								$check=mysqli_num_rows($runzs);
								
								if($check==0)
								{
			
				
								$sel="INSERT INTO `useradd`(`atype`,`aname`, `datej`, `time`) VALUES ('".$atype."','".$aname."','".$s_date."','".$s_time."')";
									
								$run=mysqli_query($con,$sel);
								
								
								if($run)
								{
									echo "<script>alert('Auction Added SuceessFully')</script>";
									
								}
								}
								else{
									
								echo "<script>alert('Your Auction Already Added')</script>";	
									
								}
								
				}
				?>


