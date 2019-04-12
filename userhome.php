<?php

include("connect.php");
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Auction</title>
<link rel="stylesheet" type="text/css" href="ustyle.css" />
        
<style>


input{
	padding:2px;
}
th,td{
	border:1px solid black;
}

	
	</style>
</head>

<body>

<div class="bg">
	<marquee><h1>ONLINE AUCTION</h1></marquee>
      
<table align="center" style="color:#000;
	
	width:500px;
	
	height:200px;
	opacity:.7;
	overflow:scroll;
	margin-left:10px;">
		<tr align="center">
        			<h2 style="margin-left:0px;COLOR:#FFF;">AUCTION VIEW <a href="index.php"><input type="button" value="Logout" /></a></h2>
                
                    </tr>
                    <tr align="center">
                   	<th> ID</th>
                    <th>AUCTION NAME</th>
                    <th>USER NAME</th>
                    <th>DATE</th>
                    <th>TIME</th>
                   
                    </tr>
                 
          
			<?php
			
			$sel="select * from  `useradd` where aname='".$_SESSION["nms"]."'";
			
			$run=mysqli_query($con,$sel);
			
			$i=0;     
			
			while($row=mysqli_fetch_array($run)){
					
				$id=$row['id'];	
				$atype=$row['atype'];
				
				$aname=$row['aname'];
				$date=$row['datej'];
				$time=$row['time'];
				 $i++;
				 
				 
				 
				 ?>
                 
                 
                 
		<tr align="center">
          	
              <td><?php echo $id; ?></td>
            <td><?php echo $atype; ?></td>
            <td><?php echo $aname;?></td>
            <td><?php echo $date;?></td>
            <td><?php echo $time;?></td>
        
            
            </tr>



<?php } ?>
		</table>	
        
        
  </div>      
  <hr />  
  <div style="color:#003;height:300px;width:600px;margin-left:600px;margin-top:-600px;">
  <table>
  <TR>
  		<th>TYPE</th>
        <th>AMOUNT</th>
      	<th>DATE</th>
  </TR>
  
  
  <?php
  
  	$x ="SELECT * FROM `auction_amount` where `uname`='".$_SESSION["nms"]."' ";
									
	$xrun=mysqli_query($con,$x);
	//INSERT INTO `auction_amount`(`id`, `uname`, `type`, `amount`, `datej`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
	while($z=mysqli_fetch_array($xrun)){
		
		$ztype=$z['type'];
		$zamount=$z['amount'];
		$zdatej=$z['datej'];
  
  
  ?>
  
   
    <TR>
    	
    	<td  style="border:2px solid black;"><?php echo $ztype;  ?></td>
    	<td  style="border:2px solid black;"><?php echo $zamount;  ?></td>
        <td  style="border:2px solid black;"><?php echo $zdatej;  ?></td>
       
       
    </TR>
  
  
  <?php } ?>
  </table>
  
  
  </div> 
  
 <DIV style="height:500px;width:1200px;margin-top:0px;">
 <div style="height:350px;width:500px;border:2px double #000033;text-align:center; ">
<h2>MESSAGE 
         </h2>
<form method="post" action="userhome.php" >

	 <select class="form-control" name="atypes" id="atypes">
       		 <option value="Select">Select</option>
                    <?php 
                                $sqlaaa="Select * from useradd where aname='".$_SESSION["nms"]."' ";
                                $zxzz=mysqli_query($con,$sqlaaa);
                                while($rowxzzc= mysqli_fetch_array($zxzz))
                    {
        
        ?>
        <option value="<?php echo $rowxzzc['atype'];  ?>"><?php echo  $rowxzzc['atype'];?></option>
        <?php
        }
         ?>
        
        </select>
        <br />


   <textarea cols="35" rows="10" name="message" id="message"></textarea>
   
  	<hr />   
    <div style="height:100px;width:300px;margin-left:250px;">
   
	<input type="submit" value="Message" name="sub"  > 
    <input type="submit" value="Search" name="search"  > 
    </div></div>
	</form> 	
       
</div>
<?php
		
		if(isset($_POST['sub'])){
			
			$message=$_POST['message'];
			$tys=$_POST['atypes'];
			
			if($tys=="Select"){
				
				echo "<script>alert('Select Your Type After Enter Your Message')</script>";
				
			}
			else
			{
			
			$selzz="SELECT * FROM `auction_amount` where `uname`='".$_SESSION["nms"]."' and type='".$tys."' ";
									
								$runzs=mysqli_query($con,$selzz);
									
								$check=mysqli_num_rows($runzs);
								
								if($check==0)
								{
			
			
			
			
				$sql="INSERT INTO `chatting`(`auction_type`, `name`, `message`) VALUES ('".$tys."','".$_SESSION["nms"]."','".$message."')";
				
				$run=mysqli_query($con,$sql);
				
				if($run){
					
				echo "<script>alert('Your Message Send SuccessFully')</script>";	
					
					
				}
								}
								else
								{
								 echo "<script>alert('Auction Complete You have not a perssion to chat')</script>";	
									
								}
		}
		}
?>

<div style="height:300px;width:700px;margin-left:550px;margin-top:-500px;overflow:scroll;">
<h1>MESSAGE</h1>
<table style="color:#000;

	width:500px;
	
	opacity:.7;
	overflow:scroll;">
	<tr>
   	<th style="border:2px solid black;">SNO</th>
    <th style="border:2px solid black;">TYPE</th>
    <th style="border:2px solid black;">NAME </th>
    <th style="border:2px solid black;">MESSAGE</th>
   
    </tr>
   
			<?php
		

			$sel="select * from  `chatting` order by id desc ";
			
			if(isset($_POST['search']))
			{
				$tysZ=$_POST['atypes'];
			
			$sel="select * from  `chatting` WHERE `auction_type`='".$tysZ."' order by id desc ";
				
			}
			
			$run=mysqli_query($con,$sel);
			
			$i=0;     
			
			while($row=mysqli_fetch_array($run))
			{
					
						
				$id=$row['id'];
				$atype=$row['auction_type'];
				$aname=$row['name'];
				$amessage=$row['message'];
				
				
								
				 $i++;
				 ?>
    
    <TR>
    	<td  style="border:2px solid black;"><?php echo $i;  ?></td>
    	<td  style="border:2px solid black;"><?php echo $atype;  ?></td>
    	<td  style="border:2px solid black;"><?php echo $aname;  ?></td>
        <td  style="border:2px solid black;"><?php echo $amessage;  ?></td>
       
       
    </TR>



<?php } ?>

</table>
</div>
</div>
</body>
</html>