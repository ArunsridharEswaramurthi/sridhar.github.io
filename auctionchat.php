<?php

include("adminloginpage.php");
include("connect.php");



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Auction </title>


<style>

table{
	color:#000;
	padding:2px;
	width:1000px;
	margin-left:350px;
	opacity:.7;
	overflow:scroll;
}
input{
	padding:5px;
}
th,td{
	border:2px solid black;
}

	
	</style>
</head>

<body>
<table align="center" >
		<tr align="center">
        			<h2 style="margin-left:600px;COLOR:#FFF;margin-top:-500px;">MESSAGE VIEW</h2>
                	
                    
                    <tr>
                    <td><form method="post" action="auctionchat.php">
                    <input type="text" name="names" id="names" placeholder="Enter Your Search" />
                    
                    </td>
                    <td><input type="submit" name="sub" id="sub" value="Search" /></td>
                    </tr>
                
                    </tr>
                    <tr align="center">
                   	<th> ID</th>
                    <th>AUCTION NAME</th>
                    <th>USER NAME</th>
                    <th>CHAT</th>
                     <th>DELETE</th>
                   
                    </tr>
                 
          
			<?php
			//INSERT INTO `chatting`(`id`, `auction_type`, `name`, `message`) VALUES ([value-1],[value-2],[value-3],[value-4])
			$sel="select * from  chatting ";
			
			if(isset($_POST['sub']))
			{
				
			$name=$_POST['names'];
			$sel="select * from  chatting where ( `auction_type`='".$name."' OR `name`='".$name."')";	
				
			}
			
			$run=mysqli_query($con,$sel);
			
			$i=0;     
			
			while($row=mysqli_fetch_array($run)){
					
				$id=$row['id'];	
				$atype=$row['auction_type'];
				
				$aname=$row['name'];
				$message=$row['message'];
		
				 $i++;
				 
				 
				 
				 ?>
                 
                 
                 
		<tr align="center">
          	
            <td><?php echo $id; ?></td>
            <td><?php echo $atype; ?></td>
            <td><?php echo $aname;?></td>
            <td><?php echo $message;?></td>
            <td><a href="auctionchat.php?id=<?php echo $id ;?>">DELETE</a></td>
           
            
            </tr>



<?php } ?>
		</table>	
        
        
        <?php
		if(isset($_GET['id'])){
			
			$get_id=$_GET['id'];
			
			
			$delete="DELETE FROM `chatting` WHERE id='".$get_id."' ";
			
			$delete_run=mysqli_query($con,$delete);
			if($delete_run){
				
				echo "<script>alert('Auction has been delete')</script>";
				echo "<script>window.open('auctionchat.php','_self')</script>";

			}
		}
		?>
</body>
</html>